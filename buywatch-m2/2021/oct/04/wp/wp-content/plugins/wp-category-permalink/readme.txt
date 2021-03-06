=== WP Category Permalink ===
Contributors: TigrouMeow, Okonomiyaki3000
Tags: category, permalink, woocommerce
Requires at least: 3.5
Tested up to: 4.7.2
Stable tag: 3.2.6

Allows manual selection of a 'main' category for each post for nicer permalinks and better SEO. Pro version adds custom post type support.

== Description ==

This plugin allows you to select a main category (or taxonomy) for your posts for nicer permalinks and SEO.

**What it does**. A custom structure such as **/%category%/%postname%/** should be usually chosen for your permalinks. By default, this %category% is selected automatically (using the lowest ID) in the case your post is assigned to more than one category. This plugin will let you pick the category of your choice from the 'Post Edit' page. The chosen category is shown in bold on the 'Posts List' page and the 'Post Edit' page.

**Post list**. Below the title, you will see the permalink currently set-up for this entry. If a heart is present, it means that the category (or taxonomy) has been picked up.

**Pro Version**. Features added based on requests from users are made available in the Pro version. For now, the Pro adds support for custom post type and custom taxonomy support (gallery plugins or themes, WooCommerce, etc). Learn more on https://meowapps.com/wp-category-permalink/.

**Breadcrumbs**. They have their own way of working and can't be supported automatically by default because they are created by specific themes or plugins. If you encounter issues with breadcrumbs, please say so in the Support Threads and let's see how we can make it work.

Languages: English.

== Installation ==

1. Upload `wp-category-permalink.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

Please ask your questions in the forum and I will add them here :)

== Upgrade Notice ==

Nothing to be careful about here, just update :)

== Screenshots ==

1. Pick the category you'd like to have for the permalink.
2. Check your permalinks in the posts list. If a heart is present, it means a category (or taxonomy) has been chosen.

== Changelog ==

= 3.2.6 =
* Fix: Avoid double trailing slashes.

= 3.2.4 =
* Fix: Trailing slashes.

= 3.2.3 =
* Fix: Display issues (heart icon was flying all over the place).
* Fix: Permalinks are handled in a much better way. More support for other plugins for custom permalinks.

= 3.2.2 =
* Fix: Handle events on the label instead of the li. Inject the link into the label too.
* Update: Additional error handling.

= 3.0.4 =
* Update: Enhance the way the post meta is handled.
* Fix: Now newly created categories can be selected.
* Fix: Pro version validation.

= 3.0.3 =
- Fix: The permalink below the title was showing a warning even though the category has been picked with a previous version of the plugin.
- Fix: The categories were not bold nor red on the Posts list. With Pro, that also works with WooCommerce well :)
- Fix: Issue from the past. If you can't seem to save your columns, you might need to run the query "DELETE FROM `wp_usermeta` WHERE `meta_key` LIKE '%wp_manageedit%'" on your DB, just once, to repair the View Screen options.

= 3.0.2 =
- Fix: Issue with multisite (with the includes).
- Add: Permalink shown below the title of the posts list (can be disabled in the option). Heart means a category has been picked, otherwise a little red warning is shown.
- Update: A lot of coding & UI improvements.

= 2.2.8 =
- Fix: Infinite hidden columns to user meta (https://wordpress.org/support/topic/infinite-user-meta).

= 2.0 =
- Fix: Update issue for non-WooCommerce user.
- Change: Let's make it 2.0 since it's a major change.

= 1.0 =
- Stable release.

= 0.1.4 =
- Add: default category will be shown in red if no category was picked.
