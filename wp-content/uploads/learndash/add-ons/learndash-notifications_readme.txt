=== LearnDash Notifications ===
Author: LearnDash
Author URI: https://learndash.com 
Plugin URI: https://learndash.com/add-on/learndash-notifications/
LD Requires at least: 3.0
Slug: learndash-notifications
Tags: notifications, emails
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.0
Stable tag: 1.4.0

Send email notifications based on LearnDash actions.

== Description ==

Send email notifications based on LearnDash actions.

This add-on enables a new level of learner engagement within your LearnDash courses. Configure various notifications to be sent out automatically based on what learners do (and do not do) in a course.

This is a perfect tool for bolstering learner engagement, encouragement, promotions, and cross-selling.

= Add-on Features = 

* Automatically Send Notifications
* 13 Available Triggers
* 34 Dynamic Shortcodes
* Delay Notifications
* Choose Recipients

See the [Add-on](https://learndash.com/add-on/learndash-notifications/) page for more information.

== Installation ==

If the auto-update is not working, verify that you have a valid LearnDash LMS license via LEARNDASH LMS > SETTINGS > LMS LICENSE. 

Alternatively, you always have the option to update manually. Please note, a full backup of your site is always recommended prior to updating. 

1. Deactivate and delete your current version of the add-on.
1. Download the latest version of the add-on from our [support site](https://support.learndash.com/article-categories/free/).
1. Upload the zipped file via PLUGINS > ADD NEW, or to wp-content/plugins.
1. Activate the add-on plugin via the PLUGINS menu.

== Changelog ==

= 1.4.0 =
* Added trigger in email header for essay and comment notification so its content can be filtered using `wp_mail` filter hook
* Added default charset and collate for DB table creation
* Added course enrollment notification trigger via course group addition workflow
* Added `lesson_id` and `topic_id` to quiz triggers email sending function
* Added quiz submitted trigger and add set global quiz result function
* Added submit essay trigger
* Added filter to decide whether to send notification or not
* Added filter to disable not logged in notification for all courses
* Added bcc to the fix recipient tool
* Added categories result output to quiz shortcode, bump
* Added undefined shortcode atts in `send_delayed_emails()` function
* Added filter hook to allow filter comment notification recipients
* Added default value to notification param in `learndash_notifications_get_recipients_emails()`
* Added documentation text for course enrollment trigger via group
* Added filter hook for course expires notification
* Added `bypass_transient` param to `ld_lesson_access_from()` call
* Added empty DB table tool
* Added custom file debug function
* Added filter hook to modify email subject and content
* Added topic support for approve and upload assignment trigger
* Added add resend missed scheduled notifications function and remove `delete_delayed_emails` from hourly cron
* Added add lesson available notification handler for users enrolled via group
* Added action hooks to several functions and add logger to log actions
* Added empty db table tool confirmation
* Updated code section with set global function
* Updated trigger text label
* Updated shortcode attribute check logic
* Updated default charset to utf8mb4 and bump DB version for update
* Updated update DB column data types
* Updated backward compatibility with PHP 7 and lower
* Updated filter duplicate emails from recipient emails
* Updated to not allow notifications with empty recipients to be stored in DB
* Updated to allow emails to be sent even when the recipient is empty
* Updated to move subscription notice to subscription manager class using email content filter hook
* Updated to bail sending essay or assignment comment notification only if it is already marked as spam
* Updated to add expired course check logic in not logged in trigger notification
* Updated to delete lesson available scheduled emails if access date has passed the current time
* Updated to add bypass transient param for LD functions related to getting group IDs
* Updated to not wpautop email content if it is HTML email
* Updated re-merge essay submitted and quiz submitted trigger
* Fixed format attr value is not taken in `ld_notifications` shortcode
* Fixed miscellaneous PHP errors
* Fixed `group_users` data not retrieving the latest users
* Fixed recipient tool by deleting duplicate emails with the same recipient and shortcode data
* Fixed scheduled notification recipients tool
* Fixed scheduled notification recipient update
* Fixed typo on course ID
* Fixed enroll course via group trigger
* Fixed quiz trigger send all notifications to user if admin mark a quiz as completed
* Fixed group leader recipient for group enrollment trigger
* Fixed PHP warning in `learndash_notifications_course_expires_after()`
* Fixed SQL regex pattern to prevent duplicate scheduled notifications
* Fixed HTML tag stripped in notification content
* Fixed add `error_reporting` to update lesson available cron function
* Fixed missing args quantity argument in `add_action` call
* Fixed assignment and essay comment notification sent to all admins
* Fixed aggregate and cumulative timespent shortcode value because of formatted number
* Fixed shortcode output for cumulative value
* Fixed undefined index array key
* Fixed shortcode attr for completed on date, aggregate and cumulative points field because quizzes use new meta key name
* Fixed `aggregate_timespent` shortcode value always return small number
* Fixed DB syntax error because of unescaped single quote in regex pattern
* Fixed regexp pattern when deleting notifications by multiple shortcode data key value pairs which results in notifications not being able to be scheduled in DB for some users
* Fixed subscriptions manager page URL not working for sites with unique permalink format
* Removed `testing.txt` from tracked files


View the full changelog [here](https://www.learndash.com/add-on/learndash-notifications/).