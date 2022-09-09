# This file is licensed under the Affero General Public License version 3 or
# later. See the COPYING file.

app_name=Appointments
app_id=appointments
build_directory=$(CURDIR)/build
temp_build_directory=$(build_directory)/temp
build_tools_directory=$(CURDIR)/build/tools


project_directory=$(CURDIR)/../$(app_name)
build_tools_directory=$(CURDIR)/build/tools
appstore_build_directory=$(CURDIR)/build/artifacts/appstore
appstore_package_name=$(appstore_build_directory)/$(app_name)

all: dev-setup build-js-production test

release: npm-init build-js-production build-tarball

# Dev env management
dev-setup: clean clean-dev composer npm-init

# Dependencies
composer:
	composer install --prefer-dist

composer-update:
	composer update --prefer-dist

npm-init:
	npm ci

npm-update:
	npm update

# Building
build-js:
	npm run dev

build-js-production:
	npm run build

watch-js:
	npm run watch

# Cleaning
clean:
	rm -rf js

clean-dev:
	rm -rf node_modules

# Tests
test:
	phpunit -c phpunit.xml
	phpunit -c phpunit.integration.xml

test-php-coverage:
	phpunit -c phpunit.xml --coverage-clover=coverage-unit.xml
	phpunit -c phpunit.integration.xml --coverage-clover=coverage-integration.xml

# Get timezone data from comm-central calendar project https://hg.mozilla.org/comm-central/file/tip/calendar by Mozilla, licensed under the MPL 2.0 https://www.mozilla.org/en-US/MPL/2.0/
timezones:
	curl https://hg.mozilla.org/comm-central/raw-file/tip/calendar/timezones/zones.json --output ajax/zones.json


# Builds the source package for the app store, ignores php and js tests
build-tarball:
	rm -rf $(build_directory)
	mkdir -p $(temp_build_directory)
	rsync -a \
	--exclude=".git" \
	--exclude=".github" \
	--exclude=".tx" \
	--exclude=".vscode" \
	--exclude="build" \
	--exclude="node_modules" \
	--exclude="screenshots" \
	--exclude="scss" \
	--exclude="src" \
	--exclude="tests" \
	--exclude="vendor" \
	--exclude=".gitignore" \
	--exclude=".l10nignore" \
	--exclude="babel.config.js" \
	--exclude="composer.json" \
	--exclude="composer.lock" \
	--exclude="Makefile" \
	--exclude="package-lock.json" \
	--exclude="package.json" \
	--exclude="phpunit.integration.xml" \
	--exclude="phpunit.xml" \
	--exclude="pnpm-lock.yaml" \
	--exclude="webpack.common.js" \
	--exclude="webpack.dev.js" \
	--exclude="webpack.prod.js" \
	../$(app_name)/ $(temp_build_directory)/$(app_id)
	tar czf $(build_directory)/$(app_name).tar.gz \
		-C $(temp_build_directory) $(app_id)
