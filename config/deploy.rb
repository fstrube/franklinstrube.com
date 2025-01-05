set :application, "franklinstrube.com"
set :repository, "."
set :deploy_via, :rsync
set :rsync_filter, [
  ".bundle",
  ".git*",
  ".svn",
  ".tags*",
  "/bin",
  "/Capfile",
  "/config",
  "/Gemfile*",
  "/vendor"
]
set :default_stage, "development"

default_run_options[:pty] = true
