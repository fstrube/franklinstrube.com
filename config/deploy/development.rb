role :web, "bulbasaur"
role :app, "bulbasaur"
role :db,  "bulbasaur", :primary => true

set :deploy_to, "/var/www/com.franklinstrube"

set :use_sudo, false
set :group_writable, false
