import './bootstrap';
import { EditorView } from '@codemirror/view';
import { markdown } from '@codemirror/lang-markdown';
import { syntaxHighlighting, defaultHighlightStyle } from '@codemirror/language';

$(function() {
    $(document).on('change', '[data-action="goto-page"]', (e) => {
        window.location = $(e.currentTarget).val();
    });

    $(document).on('click', '[data-expandable]', (e) => {
        const $expandable = $(e.currentTarget);

        if (!$expandable.is('[data-open]')) {
            $expandable.attr('data-open', true);
        }

        $(document).on('click.expandable', (e) => {
            if ($.contains($expandable.get(0), e.target)) {
                return;
            }

            $expandable.removeAttr('data-open');

            $(document).off('click.expandable');
        });
    });

    $(document).on('click', '[data-action="toggle-nav"]', (e) => {
        e.preventDefault();

        const $target = $(e.currentTarget);
        const $nav = $target.closest('.pages');

        if ($nav.is('[data-open]')) {
            $nav.removeAttr('data-open');
        } else {
            $nav.attr('data-open', true);
        }
    });

    // Initialize notifications
    $('.notifications .notification').each(function () {
        const $notification = $(this);
        const dismiss = $notification.data('dismiss');

        if (dismiss) {
            setTimeout(() => {
                $notification.fadeOut();
            }, $notification.data('dismiss') || 1500);
        } else {
            $notification.append(`<button><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg></button>`);
        }

        $notification.on('click', 'button', (e) => $notification.fadeOut());
    });

    // Initialize code editors
    $('.code-editor').each(function () {
        const $editor = $(this);
        const $form = $editor.closest('form');
        const editor = new EditorView({
            parent: this,
            doc: $editor.data('value'),
            extensions: [
                markdown(),
                syntaxHighlighting(defaultHighlightStyle),
                EditorView.lineWrapping,
                EditorView.contentAttributes.of({ id: $editor.data('id') })
            ],
        });

        $editor.on('drop', (e) => {
            const file = e.originalEvent.dataTransfer?.files[0] || null;
            const data = new FormData();

            data.append('_token', $editor.data('token'));

            if (file) {
                data.append('file', file, file.name);

                $.ajax(
                    {
                        url: $editor.data('upload-url'),
                        data,
                        processData: false,
                        contentType: false,
                        method: 'POST'
                    }
                )
                    .then(response => {
                        editor.dispatch({
                            changes: {
                                from: editor.viewState.state.selection?.ranges[0]?.from || 0,
                                to: editor.viewState.state.selection?.ranges[0]?.to || 0,
                                insert: `![${file.name}](${response.url})`,
                            },
                        });
                    });
            }
        });

        $form.find(`label[for="${$editor.data('id')}"]`).on('click', () => {
            editor.focus();
        });

        $form.on('submit', (e) => {
            const $input = $form.find(`input[name="${$editor.data('name')}"]`);
            const doc = editor.state.doc.toString();

            if ($input.length) {
                $input.val(doc);
            } else {
                $form.append($(`<input type="hidden" name="${$editor.data('name')}">`).val(doc));
            }
        });
    });

    // Initialize tag inputs
    $('.tags-input').each(function () {
        const $this = $(this);
        const $input = $this.find('[contenteditable]');

        const template = (tag) => {
            return `
                <span class="tag" tabindex="0" data-value="${tag}">
                    <input name="${$this.data('name')}[]" type="hidden" value="${tag}">
                    <span>${tag}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6"><path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                </span>`;
        }

        $this.closest('form').find(`label[for="${$this.data('id')}"]`).on('click', () => {
            $input.focus();
        });

        $this.data('tags').forEach(tag => {
            const $tag = $this.find('.tag').last();

            if ($tag.length) {
                $tag.after(template(tag));
            } else {
                $this.prepend(template(tag));
            }
        });

        $this.on('click', '.tag svg', (e) => {
            const $tag = $(e.currentTarget).closest('.tag');

            $tag.remove();

            $this.trigger('change');
        });

        $this.on('keydown', '.tag', (e) => {
            if (e.originalEvent.key === 'ArrowRight') {
                const $tag = $(e.currentTarget);
                const $next = $tag.next('.tag');

                if ($next.length) {
                    $next.trigger('focus');
                } else {
                    $input.trigger('focus');
                }
            }

            if (e.originalEvent.key === 'ArrowLeft') {
                const $tag = $(e.currentTarget);
                const $previous = $tag.prev('.tag');

                $previous.trigger('focus');
            }

            if (e.originalEvent.key === 'Backspace') {
                e.preventDefault();

                const $tag = $(e.currentTarget);
                const $previous = $tag.prev('.tag');

                if ($previous.length) {
                    $previous.trigger('focus');
                } else {
                    $input.trigger('focus');
                }

                $tag.remove();

                $this.trigger('change');
            }
        });

        $input.on('input', (e) => {
            const input = e.target;
            const selection = document.getSelection();
            const { endOffset, startOffset } = selection.getRangeAt(0);
            const { data, inputType } = e.originalEvent;
            const range = document.createRange();
            let newStartOffset, textNode;

            if (inputType !== 'insertText') {
                return;
            }

            if (data === ',') {
                const $tag = $this.find('.tag').last();
                const tag = template($input.text().replace(/,$/g, ''));

                if ($tag.length) {
                    $tag.after(tag);
                } else {
                    $this.prepend(tag);
                }

                $input.text('');

                $this.trigger('change');

                return;
            }

            input.innerHTML = input.innerText.replace(/(\r?\n)+$/, '').replace(/[\s]/g, '-');

            // Move cursor back to original position
            textNode = input.childNodes[0];
            newStartOffset = Math.min(textNode.nodeValue.length, startOffset);
            selection.removeAllRanges();
            range.setStart(textNode, newStartOffset);
            range.setEnd(textNode, newStartOffset);
            selection.addRange(range);
        });

        $input.on('keydown', (e) => {
            const selection = document.getSelection();

            if (e.originalEvent.key === 'Enter') {
                e.preventDefault();

                if (!$input.text()) {
                    $input.closest('form').trigger('submit');

                    return;
                }

                const $tag = $this.find('.tag').last();
                const tag = template($input.text());

                if ($tag.length) {
                    $tag.after(tag);
                } else {
                    $this.prepend(tag);
                }

                $input.text('');

                $this.trigger('change');
            }

            if (e.originalEvent.key === 'Backspace' || e.originalEvent.key === 'ArrowLeft') {
                const range = selection.getRangeAt(0);

                if (range.startOffset === 0 && range.endOffset === 0) {
                    const $tag = $this.find('.tag').last();

                    if ($tag.length) {
                        $tag.trigger('focus');
                    }
                }
            }
        });

        $this.trigger('change');
    })
});
