role :web, "franklinstrube.com"
role :app, "franklinstrube.com"
role :db,  "franklinstrube.com", :primary => true

set :deploy_to, "www/wordpress"
