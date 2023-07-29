db_restart: rollback migrate seed_service seed_order seed_order_service

rollback:
	php spark migrate:rollback -b 1

migrate:
	php spark migrate

seed_service:
	php spark db:seed ServiceSeeder

seed_order:
	php spark db:seed OrderSeeder

seed_order_service:
	php spark db:seed OrderServiceSeeder
