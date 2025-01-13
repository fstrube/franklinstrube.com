import './bootstrap';
import { EditorView } from '@codemirror/view';
import { markdown } from '@codemirror/lang-markdown';
import { syntaxHighlighting, defaultHighlightStyle } from '@codemirror/language';

$(function() {
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

        $input.on('keydown', (e) => {
            const input = $input.get(0);
            const selection = document.getSelection();

            if (e.originalEvent.key === ',' || e.originalEvent.key === 'Enter') {
                e.preventDefault();

                if (!$input.text()) {
                    if (e.originalEvent.key === 'Enter') {
                        $input.closest('form').trigger('submit');
                    }

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

            if (e.originalEvent.key === ' ') {
                e.preventDefault();

                const input = $input.get(0);
                const { startOffset, endOffset } = selection.getRangeAt(0);
                const newValue = $input.text().substr(0, startOffset) + '-' + $input.text().substr(endOffset);
                const range = document.createRange();

                $input.text(newValue);
                range.setStart(input.childNodes[0], startOffset + 1);
                range.setEnd(input.childNodes[0], startOffset + 1);
                selection.removeAllRanges();
                selection.addRange(range);
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