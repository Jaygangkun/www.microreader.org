=== Stripe for LearnDash ===
Author: LearnDash
Author URI: https://learndash.com 
Plugin URI: https://learndash.com/add-on/stripe/
LD Requires at least: 3.0
Slug: learndash-stripe
Tags: integration, payment gateway, stripe
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.0
Stable tag: 1.5.0

Integrate LearnDash LMS with Stripe.

== Description ==

Integrate LearnDash LMS with Stripe.

LearnDash comes with the ability to accept payment for courses by leveraging PayPal. Using this add-on, you can quickly and easily accept payments using the Stripe payment gateway. Use it with PayPal, or just use Stripe - the choice is yours!

= Integration Features = 

* Accept payments using Stripe
* Automatic user creation and enrollment
* Compatible with built-in PayPal option
* Lightbox overlay

See the [Add-on](https://learndash.com/add-on/stripe/) page for more information.

== Installation ==

If the auto-update is not working, verify that you have a valid LearnDash LMS license via LEARNDASH LMS > SETTINGS > LMS LICENSE. 

Alternatively, you always have the option to update manually. Please note, a full backup of your site is always recommended prior to updating. 

1. Deactivate and delete your current version of the add-on.
1. Download the latest version of the add-on from our [support site](https://support.learndash.com/article-categories/free/).
1. Upload the zipped file via PLUGINS > ADD NEW, or to wp-content/plugins.
1. Activate the add-on plugin via the PLUGINS menu.

== Changelog ==

= 1.5.0 =
* Added webhook support for legacy checkout
* Added support for Group purchase to existing logic
* Added filter hook for Stripe session args
* Updated Stripe PHP SDK dependency to `v6.43.1`
* Updated refactor integration classes
* Updated to move Stripe session creation on payment button click event
* Updated integration object variables to be global
* Updated initiate integration class in variables so that it can be referenced somewhere else
* Updated decimal currency support for amount with decimal in transaction record
* Updated two decimals arg in `amount number_format` args
* Fixed wrap function in try catch block to fix fatal error when retrieving customer when it does not exist in webhook POST data
* Fixed PHP warning because arithmetic operation expects variable to be always numeric

View the full changelog [here](https://www.learndash.com/add-on/stripe/).