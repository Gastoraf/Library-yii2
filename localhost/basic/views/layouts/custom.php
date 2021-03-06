<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
        <style>
            /*!
 *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
 *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
 */
            /* FONT PATH
             * -------------------------- */
            @font-face {
                font-family: 'FontAwesome';
                src: url('../fonts/fontawesome-webfont.eot?v=4.7.0');
                src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('../fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            .fa {
                display: inline-block;
                font: normal normal normal 14px/1 FontAwesome;
                font-size: inherit;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            /* makes the font 33% larger relative to the icon container */
            .fa-lg {
                font-size: 1.33333333em;
                line-height: 0.75em;
                vertical-align: -15%;
            }
            .fa-2x {
                font-size: 2em;
            }
            .fa-3x {
                font-size: 3em;
            }
            .fa-4x {
                font-size: 4em;
            }
            .fa-5x {
                font-size: 5em;
            }
            .fa-fw {
                width: 1.28571429em;
                text-align: center;
            }
            .fa-ul {
                padding-left: 0;
                margin-left: 2.14285714em;
                list-style-type: none;
            }
            .fa-ul > li {
                position: relative;
            }
            .fa-li {
                position: absolute;
                left: -2.14285714em;
                width: 2.14285714em;
                top: 0.14285714em;
                text-align: center;
            }
            .fa-li.fa-lg {
                left: -1.85714286em;
            }
            .fa-border {
                padding: .2em .25em .15em;
                border: solid 0.08em #eeeeee;
                border-radius: .1em;
            }
            .fa-pull-left {
                float: left;
            }
            .fa-pull-right {
                float: right;
            }
            .fa.fa-pull-left {
                margin-right: .3em;
            }
            .fa.fa-pull-right {
                margin-left: .3em;
            }
            /* Deprecated as of 4.4.0 */
            .pull-right {
                float: right;
            }
            .pull-left {
                float: left;
            }
            .fa.pull-left {
                margin-right: .3em;
            }
            .fa.pull-right {
                margin-left: .3em;
            }
            .fa-spin {
                -webkit-animation: fa-spin 2s infinite linear;
                animation: fa-spin 2s infinite linear;
            }
            .fa-pulse {
                -webkit-animation: fa-spin 1s infinite steps(8);
                animation: fa-spin 1s infinite steps(8);
            }
            @-webkit-keyframes fa-spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
            @keyframes fa-spin {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
            .fa-rotate-90 {
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
                -webkit-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                transform: rotate(90deg);
            }
            .fa-rotate-180 {
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
                -webkit-transform: rotate(180deg);
                -ms-transform: rotate(180deg);
                transform: rotate(180deg);
            }
            .fa-rotate-270 {
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
                -webkit-transform: rotate(270deg);
                -ms-transform: rotate(270deg);
                transform: rotate(270deg);
            }
            .fa-flip-horizontal {
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
                -webkit-transform: scale(-1, 1);
                -ms-transform: scale(-1, 1);
                transform: scale(-1, 1);
            }
            .fa-flip-vertical {
                -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
                -webkit-transform: scale(1, -1);
                -ms-transform: scale(1, -1);
                transform: scale(1, -1);
            }
            :root .fa-rotate-90,
            :root .fa-rotate-180,
            :root .fa-rotate-270,
            :root .fa-flip-horizontal,
            :root .fa-flip-vertical {
                filter: none;
            }
            .fa-stack {
                position: relative;
                display: inline-block;
                width: 2em;
                height: 2em;
                line-height: 2em;
                vertical-align: middle;
            }
            .fa-stack-1x,
            .fa-stack-2x {
                position: absolute;
                left: 0;
                width: 100%;
                text-align: center;
            }
            .fa-stack-1x {
                line-height: inherit;
            }
            .fa-stack-2x {
                font-size: 2em;
            }
            .fa-inverse {
                color: #ffffff;
            }
            /* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
               readers do not read off random characters that represent icons */
            .fa-glass:before {
                content: "\f000";
            }
            .fa-music:before {
                content: "\f001";
            }
            .fa-search:before {
                content: "\f002";
            }
            .fa-envelope-o:before {
                content: "\f003";
            }
            .fa-heart:before {
                content: "\f004";
            }
            .fa-star:before {
                content: "\f005";
            }
            .fa-star-o:before {
                content: "\f006";
            }
            .fa-user:before {
                content: "\f007";
            }
            .fa-film:before {
                content: "\f008";
            }
            .fa-th-large:before {
                content: "\f009";
            }
            .fa-th:before {
                content: "\f00a";
            }
            .fa-th-list:before {
                content: "\f00b";
            }
            .fa-check:before {
                content: "\f00c";
            }
            .fa-remove:before,
            .fa-close:before,
            .fa-times:before {
                content: "\f00d";
            }
            .fa-search-plus:before {
                content: "\f00e";
            }
            .fa-search-minus:before {
                content: "\f010";
            }
            .fa-power-off:before {
                content: "\f011";
            }
            .fa-signal:before {
                content: "\f012";
            }
            .fa-gear:before,
            .fa-cog:before {
                content: "\f013";
            }
            .fa-trash-o:before {
                content: "\f014";
            }
            .fa-home:before {
                content: "\f015";
            }
            .fa-file-o:before {
                content: "\f016";
            }
            .fa-clock-o:before {
                content: "\f017";
            }
            .fa-road:before {
                content: "\f018";
            }
            .fa-download:before {
                content: "\f019";
            }
            .fa-arrow-circle-o-down:before {
                content: "\f01a";
            }
            .fa-arrow-circle-o-up:before {
                content: "\f01b";
            }
            .fa-inbox:before {
                content: "\f01c";
            }
            .fa-play-circle-o:before {
                content: "\f01d";
            }
            .fa-rotate-right:before,
            .fa-repeat:before {
                content: "\f01e";
            }
            .fa-refresh:before {
                content: "\f021";
            }
            .fa-list-alt:before {
                content: "\f022";
            }
            .fa-lock:before {
                content: "\f023";
            }
            .fa-flag:before {
                content: "\f024";
            }
            .fa-headphones:before {
                content: "\f025";
            }
            .fa-volume-off:before {
                content: "\f026";
            }
            .fa-volume-down:before {
                content: "\f027";
            }
            .fa-volume-up:before {
                content: "\f028";
            }
            .fa-qrcode:before {
                content: "\f029";
            }
            .fa-barcode:before {
                content: "\f02a";
            }
            .fa-tag:before {
                content: "\f02b";
            }
            .fa-tags:before {
                content: "\f02c";
            }
            .fa-book:before {
                content: "\f02d";
            }
            .fa-bookmark:before {
                content: "\f02e";
            }
            .fa-print:before {
                content: "\f02f";
            }
            .fa-camera:before {
                content: "\f030";
            }
            .fa-font:before {
                content: "\f031";
            }
            .fa-bold:before {
                content: "\f032";
            }
            .fa-italic:before {
                content: "\f033";
            }
            .fa-text-height:before {
                content: "\f034";
            }
            .fa-text-width:before {
                content: "\f035";
            }
            .fa-align-left:before {
                content: "\f036";
            }
            .fa-align-center:before {
                content: "\f037";
            }
            .fa-align-right:before {
                content: "\f038";
            }
            .fa-align-justify:before {
                content: "\f039";
            }
            .fa-list:before {
                content: "\f03a";
            }
            .fa-dedent:before,
            .fa-outdent:before {
                content: "\f03b";
            }
            .fa-indent:before {
                content: "\f03c";
            }
            .fa-video-camera:before {
                content: "\f03d";
            }
            .fa-photo:before,
            .fa-image:before,
            .fa-picture-o:before {
                content: "\f03e";
            }
            .fa-pencil:before {
                content: "\f040";
            }
            .fa-map-marker:before {
                content: "\f041";
            }
            .fa-adjust:before {
                content: "\f042";
            }
            .fa-tint:before {
                content: "\f043";
            }
            .fa-edit:before,
            .fa-pencil-square-o:before {
                content: "\f044";
            }
            .fa-share-square-o:before {
                content: "\f045";
            }
            .fa-check-square-o:before {
                content: "\f046";
            }
            .fa-arrows:before {
                content: "\f047";
            }
            .fa-step-backward:before {
                content: "\f048";
            }
            .fa-fast-backward:before {
                content: "\f049";
            }
            .fa-backward:before {
                content: "\f04a";
            }
            .fa-play:before {
                content: "\f04b";
            }
            .fa-pause:before {
                content: "\f04c";
            }
            .fa-stop:before {
                content: "\f04d";
            }
            .fa-forward:before {
                content: "\f04e";
            }
            .fa-fast-forward:before {
                content: "\f050";
            }
            .fa-step-forward:before {
                content: "\f051";
            }
            .fa-eject:before {
                content: "\f052";
            }
            .fa-chevron-left:before {
                content: "\f053";
            }
            .fa-chevron-right:before {
                content: "\f054";
            }
            .fa-plus-circle:before {
                content: "\f055";
            }
            .fa-minus-circle:before {
                content: "\f056";
            }
            .fa-times-circle:before {
                content: "\f057";
            }
            .fa-check-circle:before {
                content: "\f058";
            }
            .fa-question-circle:before {
                content: "\f059";
            }
            .fa-info-circle:before {
                content: "\f05a";
            }
            .fa-crosshairs:before {
                content: "\f05b";
            }
            .fa-times-circle-o:before {
                content: "\f05c";
            }
            .fa-check-circle-o:before {
                content: "\f05d";
            }
            .fa-ban:before {
                content: "\f05e";
            }
            .fa-arrow-left:before {
                content: "\f060";
            }
            .fa-arrow-right:before {
                content: "\f061";
            }
            .fa-arrow-up:before {
                content: "\f062";
            }
            .fa-arrow-down:before {
                content: "\f063";
            }
            .fa-mail-forward:before,
            .fa-share:before {
                content: "\f064";
            }
            .fa-expand:before {
                content: "\f065";
            }
            .fa-compress:before {
                content: "\f066";
            }
            .fa-plus:before {
                content: "\f067";
            }
            .fa-minus:before {
                content: "\f068";
            }
            .fa-asterisk:before {
                content: "\f069";
            }
            .fa-exclamation-circle:before {
                content: "\f06a";
            }
            .fa-gift:before {
                content: "\f06b";
            }
            .fa-leaf:before {
                content: "\f06c";
            }
            .fa-fire:before {
                content: "\f06d";
            }
            .fa-eye:before {
                content: "\f06e";
            }
            .fa-eye-slash:before {
                content: "\f070";
            }
            .fa-warning:before,
            .fa-exclamation-triangle:before {
                content: "\f071";
            }
            .fa-plane:before {
                content: "\f072";
            }
            .fa-calendar:before {
                content: "\f073";
            }
            .fa-random:before {
                content: "\f074";
            }
            .fa-comment:before {
                content: "\f075";
            }
            .fa-magnet:before {
                content: "\f076";
            }
            .fa-chevron-up:before {
                content: "\f077";
            }
            .fa-chevron-down:before {
                content: "\f078";
            }
            .fa-retweet:before {
                content: "\f079";
            }
            .fa-shopping-cart:before {
                content: "\f07a";
            }
            .fa-folder:before {
                content: "\f07b";
            }
            .fa-folder-open:before {
                content: "\f07c";
            }
            .fa-arrows-v:before {
                content: "\f07d";
            }
            .fa-arrows-h:before {
                content: "\f07e";
            }
            .fa-bar-chart-o:before,
            .fa-bar-chart:before {
                content: "\f080";
            }
            .fa-twitter-square:before {
                content: "\f081";
            }
            .fa-facebook-square:before {
                content: "\f082";
            }
            .fa-camera-retro:before {
                content: "\f083";
            }
            .fa-key:before {
                content: "\f084";
            }
            .fa-gears:before,
            .fa-cogs:before {
                content: "\f085";
            }
            .fa-comments:before {
                content: "\f086";
            }
            .fa-thumbs-o-up:before {
                content: "\f087";
            }
            .fa-thumbs-o-down:before {
                content: "\f088";
            }
            .fa-star-half:before {
                content: "\f089";
            }
            .fa-heart-o:before {
                content: "\f08a";
            }
            .fa-sign-out:before {
                content: "\f08b";
            }
            .fa-linkedin-square:before {
                content: "\f08c";
            }
            .fa-thumb-tack:before {
                content: "\f08d";
            }
            .fa-external-link:before {
                content: "\f08e";
            }
            .fa-sign-in:before {
                content: "\f090";
            }
            .fa-trophy:before {
                content: "\f091";
            }
            .fa-github-square:before {
                content: "\f092";
            }
            .fa-upload:before {
                content: "\f093";
            }
            .fa-lemon-o:before {
                content: "\f094";
            }
            .fa-phone:before {
                content: "\f095";
            }
            .fa-square-o:before {
                content: "\f096";
            }
            .fa-bookmark-o:before {
                content: "\f097";
            }
            .fa-phone-square:before {
                content: "\f098";
            }
            .fa-twitter:before {
                content: "\f099";
            }
            .fa-facebook-f:before,
            .fa-facebook:before {
                content: "\f09a";
            }
            .fa-github:before {
                content: "\f09b";
            }
            .fa-unlock:before {
                content: "\f09c";
            }
            .fa-credit-card:before {
                content: "\f09d";
            }
            .fa-feed:before,
            .fa-rss:before {
                content: "\f09e";
            }
            .fa-hdd-o:before {
                content: "\f0a0";
            }
            .fa-bullhorn:before {
                content: "\f0a1";
            }
            .fa-bell:before {
                content: "\f0f3";
            }
            .fa-certificate:before {
                content: "\f0a3";
            }
            .fa-hand-o-right:before {
                content: "\f0a4";
            }
            .fa-hand-o-left:before {
                content: "\f0a5";
            }
            .fa-hand-o-up:before {
                content: "\f0a6";
            }
            .fa-hand-o-down:before {
                content: "\f0a7";
            }
            .fa-arrow-circle-left:before {
                content: "\f0a8";
            }
            .fa-arrow-circle-right:before {
                content: "\f0a9";
            }
            .fa-arrow-circle-up:before {
                content: "\f0aa";
            }
            .fa-arrow-circle-down:before {
                content: "\f0ab";
            }
            .fa-globe:before {
                content: "\f0ac";
            }
            .fa-wrench:before {
                content: "\f0ad";
            }
            .fa-tasks:before {
                content: "\f0ae";
            }
            .fa-filter:before {
                content: "\f0b0";
            }
            .fa-briefcase:before {
                content: "\f0b1";
            }
            .fa-arrows-alt:before {
                content: "\f0b2";
            }
            .fa-group:before,
            .fa-users:before {
                content: "\f0c0";
            }
            .fa-chain:before,
            .fa-link:before {
                content: "\f0c1";
            }
            .fa-cloud:before {
                content: "\f0c2";
            }
            .fa-flask:before {
                content: "\f0c3";
            }
            .fa-cut:before,
            .fa-scissors:before {
                content: "\f0c4";
            }
            .fa-copy:before,
            .fa-files-o:before {
                content: "\f0c5";
            }
            .fa-paperclip:before {
                content: "\f0c6";
            }
            .fa-save:before,
            .fa-floppy-o:before {
                content: "\f0c7";
            }
            .fa-square:before {
                content: "\f0c8";
            }
            .fa-navicon:before,
            .fa-reorder:before,
            .fa-bars:before {
                content: "\f0c9";
            }
            .fa-list-ul:before {
                content: "\f0ca";
            }
            .fa-list-ol:before {
                content: "\f0cb";
            }
            .fa-strikethrough:before {
                content: "\f0cc";
            }
            .fa-underline:before {
                content: "\f0cd";
            }
            .fa-table:before {
                content: "\f0ce";
            }
            .fa-magic:before {
                content: "\f0d0";
            }
            .fa-truck:before {
                content: "\f0d1";
            }
            .fa-pinterest:before {
                content: "\f0d2";
            }
            .fa-pinterest-square:before {
                content: "\f0d3";
            }
            .fa-google-plus-square:before {
                content: "\f0d4";
            }
            .fa-google-plus:before {
                content: "\f0d5";
            }
            .fa-money:before {
                content: "\f0d6";
            }
            .fa-caret-down:before {
                content: "\f0d7";
            }
            .fa-caret-up:before {
                content: "\f0d8";
            }
            .fa-caret-left:before {
                content: "\f0d9";
            }
            .fa-caret-right:before {
                content: "\f0da";
            }
            .fa-columns:before {
                content: "\f0db";
            }
            .fa-unsorted:before,
            .fa-sort:before {
                content: "\f0dc";
            }
            .fa-sort-down:before,
            .fa-sort-desc:before {
                content: "\f0dd";
            }
            .fa-sort-up:before,
            .fa-sort-asc:before {
                content: "\f0de";
            }
            .fa-envelope:before {
                content: "\f0e0";
            }
            .fa-linkedin:before {
                content: "\f0e1";
            }
            .fa-rotate-left:before,
            .fa-undo:before {
                content: "\f0e2";
            }
            .fa-legal:before,
            .fa-gavel:before {
                content: "\f0e3";
            }
            .fa-dashboard:before,
            .fa-tachometer:before {
                content: "\f0e4";
            }
            .fa-comment-o:before {
                content: "\f0e5";
            }
            .fa-comments-o:before {
                content: "\f0e6";
            }
            .fa-flash:before,
            .fa-bolt:before {
                content: "\f0e7";
            }
            .fa-sitemap:before {
                content: "\f0e8";
            }
            .fa-umbrella:before {
                content: "\f0e9";
            }
            .fa-paste:before,
            .fa-clipboard:before {
                content: "\f0ea";
            }
            .fa-lightbulb-o:before {
                content: "\f0eb";
            }
            .fa-exchange:before {
                content: "\f0ec";
            }
            .fa-cloud-download:before {
                content: "\f0ed";
            }
            .fa-cloud-upload:before {
                content: "\f0ee";
            }
            .fa-user-md:before {
                content: "\f0f0";
            }
            .fa-stethoscope:before {
                content: "\f0f1";
            }
            .fa-suitcase:before {
                content: "\f0f2";
            }
            .fa-bell-o:before {
                content: "\f0a2";
            }
            .fa-coffee:before {
                content: "\f0f4";
            }
            .fa-cutlery:before {
                content: "\f0f5";
            }
            .fa-file-text-o:before {
                content: "\f0f6";
            }
            .fa-building-o:before {
                content: "\f0f7";
            }
            .fa-hospital-o:before {
                content: "\f0f8";
            }
            .fa-ambulance:before {
                content: "\f0f9";
            }
            .fa-medkit:before {
                content: "\f0fa";
            }
            .fa-fighter-jet:before {
                content: "\f0fb";
            }
            .fa-beer:before {
                content: "\f0fc";
            }
            .fa-h-square:before {
                content: "\f0fd";
            }
            .fa-plus-square:before {
                content: "\f0fe";
            }
            .fa-angle-double-left:before {
                content: "\f100";
            }
            .fa-angle-double-right:before {
                content: "\f101";
            }
            .fa-angle-double-up:before {
                content: "\f102";
            }
            .fa-angle-double-down:before {
                content: "\f103";
            }
            .fa-angle-left:before {
                content: "\f104";
            }
            .fa-angle-right:before {
                content: "\f105";
            }
            .fa-angle-up:before {
                content: "\f106";
            }
            .fa-angle-down:before {
                content: "\f107";
            }
            .fa-desktop:before {
                content: "\f108";
            }
            .fa-laptop:before {
                content: "\f109";
            }
            .fa-tablet:before {
                content: "\f10a";
            }
            .fa-mobile-phone:before,
            .fa-mobile:before {
                content: "\f10b";
            }
            .fa-circle-o:before {
                content: "\f10c";
            }
            .fa-quote-left:before {
                content: "\f10d";
            }
            .fa-quote-right:before {
                content: "\f10e";
            }
            .fa-spinner:before {
                content: "\f110";
            }
            .fa-circle:before {
                content: "\f111";
            }
            .fa-mail-reply:before,
            .fa-reply:before {
                content: "\f112";
            }
            .fa-github-alt:before {
                content: "\f113";
            }
            .fa-folder-o:before {
                content: "\f114";
            }
            .fa-folder-open-o:before {
                content: "\f115";
            }
            .fa-smile-o:before {
                content: "\f118";
            }
            .fa-frown-o:before {
                content: "\f119";
            }
            .fa-meh-o:before {
                content: "\f11a";
            }
            .fa-gamepad:before {
                content: "\f11b";
            }
            .fa-keyboard-o:before {
                content: "\f11c";
            }
            .fa-flag-o:before {
                content: "\f11d";
            }
            .fa-flag-checkered:before {
                content: "\f11e";
            }
            .fa-terminal:before {
                content: "\f120";
            }
            .fa-code:before {
                content: "\f121";
            }
            .fa-mail-reply-all:before,
            .fa-reply-all:before {
                content: "\f122";
            }
            .fa-star-half-empty:before,
            .fa-star-half-full:before,
            .fa-star-half-o:before {
                content: "\f123";
            }
            .fa-location-arrow:before {
                content: "\f124";
            }
            .fa-crop:before {
                content: "\f125";
            }
            .fa-code-fork:before {
                content: "\f126";
            }
            .fa-unlink:before,
            .fa-chain-broken:before {
                content: "\f127";
            }
            .fa-question:before {
                content: "\f128";
            }
            .fa-info:before {
                content: "\f129";
            }
            .fa-exclamation:before {
                content: "\f12a";
            }
            .fa-superscript:before {
                content: "\f12b";
            }
            .fa-subscript:before {
                content: "\f12c";
            }
            .fa-eraser:before {
                content: "\f12d";
            }
            .fa-puzzle-piece:before {
                content: "\f12e";
            }
            .fa-microphone:before {
                content: "\f130";
            }
            .fa-microphone-slash:before {
                content: "\f131";
            }
            .fa-shield:before {
                content: "\f132";
            }
            .fa-calendar-o:before {
                content: "\f133";
            }
            .fa-fire-extinguisher:before {
                content: "\f134";
            }
            .fa-rocket:before {
                content: "\f135";
            }
            .fa-maxcdn:before {
                content: "\f136";
            }
            .fa-chevron-circle-left:before {
                content: "\f137";
            }
            .fa-chevron-circle-right:before {
                content: "\f138";
            }
            .fa-chevron-circle-up:before {
                content: "\f139";
            }
            .fa-chevron-circle-down:before {
                content: "\f13a";
            }
            .fa-html5:before {
                content: "\f13b";
            }
            .fa-css3:before {
                content: "\f13c";
            }
            .fa-anchor:before {
                content: "\f13d";
            }
            .fa-unlock-alt:before {
                content: "\f13e";
            }
            .fa-bullseye:before {
                content: "\f140";
            }
            .fa-ellipsis-h:before {
                content: "\f141";
            }
            .fa-ellipsis-v:before {
                content: "\f142";
            }
            .fa-rss-square:before {
                content: "\f143";
            }
            .fa-play-circle:before {
                content: "\f144";
            }
            .fa-ticket:before {
                content: "\f145";
            }
            .fa-minus-square:before {
                content: "\f146";
            }
            .fa-minus-square-o:before {
                content: "\f147";
            }
            .fa-level-up:before {
                content: "\f148";
            }
            .fa-level-down:before {
                content: "\f149";
            }
            .fa-check-square:before {
                content: "\f14a";
            }
            .fa-pencil-square:before {
                content: "\f14b";
            }
            .fa-external-link-square:before {
                content: "\f14c";
            }
            .fa-share-square:before {
                content: "\f14d";
            }
            .fa-compass:before {
                content: "\f14e";
            }
            .fa-toggle-down:before,
            .fa-caret-square-o-down:before {
                content: "\f150";
            }
            .fa-toggle-up:before,
            .fa-caret-square-o-up:before {
                content: "\f151";
            }
            .fa-toggle-right:before,
            .fa-caret-square-o-right:before {
                content: "\f152";
            }
            .fa-euro:before,
            .fa-eur:before {
                content: "\f153";
            }
            .fa-gbp:before {
                content: "\f154";
            }
            .fa-dollar:before,
            .fa-usd:before {
                content: "\f155";
            }
            .fa-rupee:before,
            .fa-inr:before {
                content: "\f156";
            }
            .fa-cny:before,
            .fa-rmb:before,
            .fa-yen:before,
            .fa-jpy:before {
                content: "\f157";
            }
            .fa-ruble:before,
            .fa-rouble:before,
            .fa-rub:before {
                content: "\f158";
            }
            .fa-won:before,
            .fa-krw:before {
                content: "\f159";
            }
            .fa-bitcoin:before,
            .fa-btc:before {
                content: "\f15a";
            }
            .fa-file:before {
                content: "\f15b";
            }
            .fa-file-text:before {
                content: "\f15c";
            }
            .fa-sort-alpha-asc:before {
                content: "\f15d";
            }
            .fa-sort-alpha-desc:before {
                content: "\f15e";
            }
            .fa-sort-amount-asc:before {
                content: "\f160";
            }
            .fa-sort-amount-desc:before {
                content: "\f161";
            }
            .fa-sort-numeric-asc:before {
                content: "\f162";
            }
            .fa-sort-numeric-desc:before {
                content: "\f163";
            }
            .fa-thumbs-up:before {
                content: "\f164";
            }
            .fa-thumbs-down:before {
                content: "\f165";
            }
            .fa-youtube-square:before {
                content: "\f166";
            }
            .fa-youtube:before {
                content: "\f167";
            }
            .fa-xing:before {
                content: "\f168";
            }
            .fa-xing-square:before {
                content: "\f169";
            }
            .fa-youtube-play:before {
                content: "\f16a";
            }
            .fa-dropbox:before {
                content: "\f16b";
            }
            .fa-stack-overflow:before {
                content: "\f16c";
            }
            .fa-instagram:before {
                content: "\f16d";
            }
            .fa-flickr:before {
                content: "\f16e";
            }
            .fa-adn:before {
                content: "\f170";
            }
            .fa-bitbucket:before {
                content: "\f171";
            }
            .fa-bitbucket-square:before {
                content: "\f172";
            }
            .fa-tumblr:before {
                content: "\f173";
            }
            .fa-tumblr-square:before {
                content: "\f174";
            }
            .fa-long-arrow-down:before {
                content: "\f175";
            }
            .fa-long-arrow-up:before {
                content: "\f176";
            }
            .fa-long-arrow-left:before {
                content: "\f177";
            }
            .fa-long-arrow-right:before {
                content: "\f178";
            }
            .fa-apple:before {
                content: "\f179";
            }
            .fa-windows:before {
                content: "\f17a";
            }
            .fa-android:before {
                content: "\f17b";
            }
            .fa-linux:before {
                content: "\f17c";
            }
            .fa-dribbble:before {
                content: "\f17d";
            }
            .fa-skype:before {
                content: "\f17e";
            }
            .fa-foursquare:before {
                content: "\f180";
            }
            .fa-trello:before {
                content: "\f181";
            }
            .fa-female:before {
                content: "\f182";
            }
            .fa-male:before {
                content: "\f183";
            }
            .fa-gittip:before,
            .fa-gratipay:before {
                content: "\f184";
            }
            .fa-sun-o:before {
                content: "\f185";
            }
            .fa-moon-o:before {
                content: "\f186";
            }
            .fa-archive:before {
                content: "\f187";
            }
            .fa-bug:before {
                content: "\f188";
            }
            .fa-vk:before {
                content: "\f189";
            }
            .fa-weibo:before {
                content: "\f18a";
            }
            .fa-renren:before {
                content: "\f18b";
            }
            .fa-pagelines:before {
                content: "\f18c";
            }
            .fa-stack-exchange:before {
                content: "\f18d";
            }
            .fa-arrow-circle-o-right:before {
                content: "\f18e";
            }
            .fa-arrow-circle-o-left:before {
                content: "\f190";
            }
            .fa-toggle-left:before,
            .fa-caret-square-o-left:before {
                content: "\f191";
            }
            .fa-dot-circle-o:before {
                content: "\f192";
            }
            .fa-wheelchair:before {
                content: "\f193";
            }
            .fa-vimeo-square:before {
                content: "\f194";
            }
            .fa-turkish-lira:before,
            .fa-try:before {
                content: "\f195";
            }
            .fa-plus-square-o:before {
                content: "\f196";
            }
            .fa-space-shuttle:before {
                content: "\f197";
            }
            .fa-slack:before {
                content: "\f198";
            }
            .fa-envelope-square:before {
                content: "\f199";
            }
            .fa-wordpress:before {
                content: "\f19a";
            }
            .fa-openid:before {
                content: "\f19b";
            }
            .fa-institution:before,
            .fa-bank:before,
            .fa-university:before {
                content: "\f19c";
            }
            .fa-mortar-board:before,
            .fa-graduation-cap:before {
                content: "\f19d";
            }
            .fa-yahoo:before {
                content: "\f19e";
            }
            .fa-google:before {
                content: "\f1a0";
            }
            .fa-reddit:before {
                content: "\f1a1";
            }
            .fa-reddit-square:before {
                content: "\f1a2";
            }
            .fa-stumbleupon-circle:before {
                content: "\f1a3";
            }
            .fa-stumbleupon:before {
                content: "\f1a4";
            }
            .fa-delicious:before {
                content: "\f1a5";
            }
            .fa-digg:before {
                content: "\f1a6";
            }
            .fa-pied-piper-pp:before {
                content: "\f1a7";
            }
            .fa-pied-piper-alt:before {
                content: "\f1a8";
            }
            .fa-drupal:before {
                content: "\f1a9";
            }
            .fa-joomla:before {
                content: "\f1aa";
            }
            .fa-language:before {
                content: "\f1ab";
            }
            .fa-fax:before {
                content: "\f1ac";
            }
            .fa-building:before {
                content: "\f1ad";
            }
            .fa-child:before {
                content: "\f1ae";
            }
            .fa-paw:before {
                content: "\f1b0";
            }
            .fa-spoon:before {
                content: "\f1b1";
            }
            .fa-cube:before {
                content: "\f1b2";
            }
            .fa-cubes:before {
                content: "\f1b3";
            }
            .fa-behance:before {
                content: "\f1b4";
            }
            .fa-behance-square:before {
                content: "\f1b5";
            }
            .fa-steam:before {
                content: "\f1b6";
            }
            .fa-steam-square:before {
                content: "\f1b7";
            }
            .fa-recycle:before {
                content: "\f1b8";
            }
            .fa-automobile:before,
            .fa-car:before {
                content: "\f1b9";
            }
            .fa-cab:before,
            .fa-taxi:before {
                content: "\f1ba";
            }
            .fa-tree:before {
                content: "\f1bb";
            }
            .fa-spotify:before {
                content: "\f1bc";
            }
            .fa-deviantart:before {
                content: "\f1bd";
            }
            .fa-soundcloud:before {
                content: "\f1be";
            }
            .fa-database:before {
                content: "\f1c0";
            }
            .fa-file-pdf-o:before {
                content: "\f1c1";
            }
            .fa-file-word-o:before {
                content: "\f1c2";
            }
            .fa-file-excel-o:before {
                content: "\f1c3";
            }
            .fa-file-powerpoint-o:before {
                content: "\f1c4";
            }
            .fa-file-photo-o:before,
            .fa-file-picture-o:before,
            .fa-file-image-o:before {
                content: "\f1c5";
            }
            .fa-file-zip-o:before,
            .fa-file-archive-o:before {
                content: "\f1c6";
            }
            .fa-file-sound-o:before,
            .fa-file-audio-o:before {
                content: "\f1c7";
            }
            .fa-file-movie-o:before,
            .fa-file-video-o:before {
                content: "\f1c8";
            }
            .fa-file-code-o:before {
                content: "\f1c9";
            }
            .fa-vine:before {
                content: "\f1ca";
            }
            .fa-codepen:before {
                content: "\f1cb";
            }
            .fa-jsfiddle:before {
                content: "\f1cc";
            }
            .fa-life-bouy:before,
            .fa-life-buoy:before,
            .fa-life-saver:before,
            .fa-support:before,
            .fa-life-ring:before {
                content: "\f1cd";
            }
            .fa-circle-o-notch:before {
                content: "\f1ce";
            }
            .fa-ra:before,
            .fa-resistance:before,
            .fa-rebel:before {
                content: "\f1d0";
            }
            .fa-ge:before,
            .fa-empire:before {
                content: "\f1d1";
            }
            .fa-git-square:before {
                content: "\f1d2";
            }
            .fa-git:before {
                content: "\f1d3";
            }
            .fa-y-combinator-square:before,
            .fa-yc-square:before,
            .fa-hacker-news:before {
                content: "\f1d4";
            }
            .fa-tencent-weibo:before {
                content: "\f1d5";
            }
            .fa-qq:before {
                content: "\f1d6";
            }
            .fa-wechat:before,
            .fa-weixin:before {
                content: "\f1d7";
            }
            .fa-send:before,
            .fa-paper-plane:before {
                content: "\f1d8";
            }
            .fa-send-o:before,
            .fa-paper-plane-o:before {
                content: "\f1d9";
            }
            .fa-history:before {
                content: "\f1da";
            }
            .fa-circle-thin:before {
                content: "\f1db";
            }
            .fa-header:before {
                content: "\f1dc";
            }
            .fa-paragraph:before {
                content: "\f1dd";
            }
            .fa-sliders:before {
                content: "\f1de";
            }
            .fa-share-alt:before {
                content: "\f1e0";
            }
            .fa-share-alt-square:before {
                content: "\f1e1";
            }
            .fa-bomb:before {
                content: "\f1e2";
            }
            .fa-soccer-ball-o:before,
            .fa-futbol-o:before {
                content: "\f1e3";
            }
            .fa-tty:before {
                content: "\f1e4";
            }
            .fa-binoculars:before {
                content: "\f1e5";
            }
            .fa-plug:before {
                content: "\f1e6";
            }
            .fa-slideshare:before {
                content: "\f1e7";
            }
            .fa-twitch:before {
                content: "\f1e8";
            }
            .fa-yelp:before {
                content: "\f1e9";
            }
            .fa-newspaper-o:before {
                content: "\f1ea";
            }
            .fa-wifi:before {
                content: "\f1eb";
            }
            .fa-calculator:before {
                content: "\f1ec";
            }
            .fa-paypal:before {
                content: "\f1ed";
            }
            .fa-google-wallet:before {
                content: "\f1ee";
            }
            .fa-cc-visa:before {
                content: "\f1f0";
            }
            .fa-cc-mastercard:before {
                content: "\f1f1";
            }
            .fa-cc-discover:before {
                content: "\f1f2";
            }
            .fa-cc-amex:before {
                content: "\f1f3";
            }
            .fa-cc-paypal:before {
                content: "\f1f4";
            }
            .fa-cc-stripe:before {
                content: "\f1f5";
            }
            .fa-bell-slash:before {
                content: "\f1f6";
            }
            .fa-bell-slash-o:before {
                content: "\f1f7";
            }
            .fa-trash:before {
                content: "\f1f8";
            }
            .fa-copyright:before {
                content: "\f1f9";
            }
            .fa-at:before {
                content: "\f1fa";
            }
            .fa-eyedropper:before {
                content: "\f1fb";
            }
            .fa-paint-brush:before {
                content: "\f1fc";
            }
            .fa-birthday-cake:before {
                content: "\f1fd";
            }
            .fa-area-chart:before {
                content: "\f1fe";
            }
            .fa-pie-chart:before {
                content: "\f200";
            }
            .fa-line-chart:before {
                content: "\f201";
            }
            .fa-lastfm:before {
                content: "\f202";
            }
            .fa-lastfm-square:before {
                content: "\f203";
            }
            .fa-toggle-off:before {
                content: "\f204";
            }
            .fa-toggle-on:before {
                content: "\f205";
            }
            .fa-bicycle:before {
                content: "\f206";
            }
            .fa-bus:before {
                content: "\f207";
            }
            .fa-ioxhost:before {
                content: "\f208";
            }
            .fa-angellist:before {
                content: "\f209";
            }
            .fa-cc:before {
                content: "\f20a";
            }
            .fa-shekel:before,
            .fa-sheqel:before,
            .fa-ils:before {
                content: "\f20b";
            }
            .fa-meanpath:before {
                content: "\f20c";
            }
            .fa-buysellads:before {
                content: "\f20d";
            }
            .fa-connectdevelop:before {
                content: "\f20e";
            }
            .fa-dashcube:before {
                content: "\f210";
            }
            .fa-forumbee:before {
                content: "\f211";
            }
            .fa-leanpub:before {
                content: "\f212";
            }
            .fa-sellsy:before {
                content: "\f213";
            }
            .fa-shirtsinbulk:before {
                content: "\f214";
            }
            .fa-simplybuilt:before {
                content: "\f215";
            }
            .fa-skyatlas:before {
                content: "\f216";
            }
            .fa-cart-plus:before {
                content: "\f217";
            }
            .fa-cart-arrow-down:before {
                content: "\f218";
            }
            .fa-diamond:before {
                content: "\f219";
            }
            .fa-ship:before {
                content: "\f21a";
            }
            .fa-user-secret:before {
                content: "\f21b";
            }
            .fa-motorcycle:before {
                content: "\f21c";
            }
            .fa-street-view:before {
                content: "\f21d";
            }
            .fa-heartbeat:before {
                content: "\f21e";
            }
            .fa-venus:before {
                content: "\f221";
            }
            .fa-mars:before {
                content: "\f222";
            }
            .fa-mercury:before {
                content: "\f223";
            }
            .fa-intersex:before,
            .fa-transgender:before {
                content: "\f224";
            }
            .fa-transgender-alt:before {
                content: "\f225";
            }
            .fa-venus-double:before {
                content: "\f226";
            }
            .fa-mars-double:before {
                content: "\f227";
            }
            .fa-venus-mars:before {
                content: "\f228";
            }
            .fa-mars-stroke:before {
                content: "\f229";
            }
            .fa-mars-stroke-v:before {
                content: "\f22a";
            }
            .fa-mars-stroke-h:before {
                content: "\f22b";
            }
            .fa-neuter:before {
                content: "\f22c";
            }
            .fa-genderless:before {
                content: "\f22d";
            }
            .fa-facebook-official:before {
                content: "\f230";
            }
            .fa-pinterest-p:before {
                content: "\f231";
            }
            .fa-whatsapp:before {
                content: "\f232";
            }
            .fa-server:before {
                content: "\f233";
            }
            .fa-user-plus:before {
                content: "\f234";
            }
            .fa-user-times:before {
                content: "\f235";
            }
            .fa-hotel:before,
            .fa-bed:before {
                content: "\f236";
            }
            .fa-viacoin:before {
                content: "\f237";
            }
            .fa-train:before {
                content: "\f238";
            }
            .fa-subway:before {
                content: "\f239";
            }
            .fa-medium:before {
                content: "\f23a";
            }
            .fa-yc:before,
            .fa-y-combinator:before {
                content: "\f23b";
            }
            .fa-optin-monster:before {
                content: "\f23c";
            }
            .fa-opencart:before {
                content: "\f23d";
            }
            .fa-expeditedssl:before {
                content: "\f23e";
            }
            .fa-battery-4:before,
            .fa-battery:before,
            .fa-battery-full:before {
                content: "\f240";
            }
            .fa-battery-3:before,
            .fa-battery-three-quarters:before {
                content: "\f241";
            }
            .fa-battery-2:before,
            .fa-battery-half:before {
                content: "\f242";
            }
            .fa-battery-1:before,
            .fa-battery-quarter:before {
                content: "\f243";
            }
            .fa-battery-0:before,
            .fa-battery-empty:before {
                content: "\f244";
            }
            .fa-mouse-pointer:before {
                content: "\f245";
            }
            .fa-i-cursor:before {
                content: "\f246";
            }
            .fa-object-group:before {
                content: "\f247";
            }
            .fa-object-ungroup:before {
                content: "\f248";
            }
            .fa-sticky-note:before {
                content: "\f249";
            }
            .fa-sticky-note-o:before {
                content: "\f24a";
            }
            .fa-cc-jcb:before {
                content: "\f24b";
            }
            .fa-cc-diners-club:before {
                content: "\f24c";
            }
            .fa-clone:before {
                content: "\f24d";
            }
            .fa-balance-scale:before {
                content: "\f24e";
            }
            .fa-hourglass-o:before {
                content: "\f250";
            }
            .fa-hourglass-1:before,
            .fa-hourglass-start:before {
                content: "\f251";
            }
            .fa-hourglass-2:before,
            .fa-hourglass-half:before {
                content: "\f252";
            }
            .fa-hourglass-3:before,
            .fa-hourglass-end:before {
                content: "\f253";
            }
            .fa-hourglass:before {
                content: "\f254";
            }
            .fa-hand-grab-o:before,
            .fa-hand-rock-o:before {
                content: "\f255";
            }
            .fa-hand-stop-o:before,
            .fa-hand-paper-o:before {
                content: "\f256";
            }
            .fa-hand-scissors-o:before {
                content: "\f257";
            }
            .fa-hand-lizard-o:before {
                content: "\f258";
            }
            .fa-hand-spock-o:before {
                content: "\f259";
            }
            .fa-hand-pointer-o:before {
                content: "\f25a";
            }
            .fa-hand-peace-o:before {
                content: "\f25b";
            }
            .fa-trademark:before {
                content: "\f25c";
            }
            .fa-registered:before {
                content: "\f25d";
            }
            .fa-creative-commons:before {
                content: "\f25e";
            }
            .fa-gg:before {
                content: "\f260";
            }
            .fa-gg-circle:before {
                content: "\f261";
            }
            .fa-tripadvisor:before {
                content: "\f262";
            }
            .fa-odnoklassniki:before {
                content: "\f263";
            }
            .fa-odnoklassniki-square:before {
                content: "\f264";
            }
            .fa-get-pocket:before {
                content: "\f265";
            }
            .fa-wikipedia-w:before {
                content: "\f266";
            }
            .fa-safari:before {
                content: "\f267";
            }
            .fa-chrome:before {
                content: "\f268";
            }
            .fa-firefox:before {
                content: "\f269";
            }
            .fa-opera:before {
                content: "\f26a";
            }
            .fa-internet-explorer:before {
                content: "\f26b";
            }
            .fa-tv:before,
            .fa-television:before {
                content: "\f26c";
            }
            .fa-contao:before {
                content: "\f26d";
            }
            .fa-500px:before {
                content: "\f26e";
            }
            .fa-amazon:before {
                content: "\f270";
            }
            .fa-calendar-plus-o:before {
                content: "\f271";
            }
            .fa-calendar-minus-o:before {
                content: "\f272";
            }
            .fa-calendar-times-o:before {
                content: "\f273";
            }
            .fa-calendar-check-o:before {
                content: "\f274";
            }
            .fa-industry:before {
                content: "\f275";
            }
            .fa-map-pin:before {
                content: "\f276";
            }
            .fa-map-signs:before {
                content: "\f277";
            }
            .fa-map-o:before {
                content: "\f278";
            }
            .fa-map:before {
                content: "\f279";
            }
            .fa-commenting:before {
                content: "\f27a";
            }
            .fa-commenting-o:before {
                content: "\f27b";
            }
            .fa-houzz:before {
                content: "\f27c";
            }
            .fa-vimeo:before {
                content: "\f27d";
            }
            .fa-black-tie:before {
                content: "\f27e";
            }
            .fa-fonticons:before {
                content: "\f280";
            }
            .fa-reddit-alien:before {
                content: "\f281";
            }
            .fa-edge:before {
                content: "\f282";
            }
            .fa-credit-card-alt:before {
                content: "\f283";
            }
            .fa-codiepie:before {
                content: "\f284";
            }
            .fa-modx:before {
                content: "\f285";
            }
            .fa-fort-awesome:before {
                content: "\f286";
            }
            .fa-usb:before {
                content: "\f287";
            }
            .fa-product-hunt:before {
                content: "\f288";
            }
            .fa-mixcloud:before {
                content: "\f289";
            }
            .fa-scribd:before {
                content: "\f28a";
            }
            .fa-pause-circle:before {
                content: "\f28b";
            }
            .fa-pause-circle-o:before {
                content: "\f28c";
            }
            .fa-stop-circle:before {
                content: "\f28d";
            }
            .fa-stop-circle-o:before {
                content: "\f28e";
            }
            .fa-shopping-bag:before {
                content: "\f290";
            }
            .fa-shopping-basket:before {
                content: "\f291";
            }
            .fa-hashtag:before {
                content: "\f292";
            }
            .fa-bluetooth:before {
                content: "\f293";
            }
            .fa-bluetooth-b:before {
                content: "\f294";
            }
            .fa-percent:before {
                content: "\f295";
            }
            .fa-gitlab:before {
                content: "\f296";
            }
            .fa-wpbeginner:before {
                content: "\f297";
            }
            .fa-wpforms:before {
                content: "\f298";
            }
            .fa-envira:before {
                content: "\f299";
            }
            .fa-universal-access:before {
                content: "\f29a";
            }
            .fa-wheelchair-alt:before {
                content: "\f29b";
            }
            .fa-question-circle-o:before {
                content: "\f29c";
            }
            .fa-blind:before {
                content: "\f29d";
            }
            .fa-audio-description:before {
                content: "\f29e";
            }
            .fa-volume-control-phone:before {
                content: "\f2a0";
            }
            .fa-braille:before {
                content: "\f2a1";
            }
            .fa-assistive-listening-systems:before {
                content: "\f2a2";
            }
            .fa-asl-interpreting:before,
            .fa-american-sign-language-interpreting:before {
                content: "\f2a3";
            }
            .fa-deafness:before,
            .fa-hard-of-hearing:before,
            .fa-deaf:before {
                content: "\f2a4";
            }
            .fa-glide:before {
                content: "\f2a5";
            }
            .fa-glide-g:before {
                content: "\f2a6";
            }
            .fa-signing:before,
            .fa-sign-language:before {
                content: "\f2a7";
            }
            .fa-low-vision:before {
                content: "\f2a8";
            }
            .fa-viadeo:before {
                content: "\f2a9";
            }
            .fa-viadeo-square:before {
                content: "\f2aa";
            }
            .fa-snapchat:before {
                content: "\f2ab";
            }
            .fa-snapchat-ghost:before {
                content: "\f2ac";
            }
            .fa-snapchat-square:before {
                content: "\f2ad";
            }
            .fa-pied-piper:before {
                content: "\f2ae";
            }
            .fa-first-order:before {
                content: "\f2b0";
            }
            .fa-yoast:before {
                content: "\f2b1";
            }
            .fa-themeisle:before {
                content: "\f2b2";
            }
            .fa-google-plus-circle:before,
            .fa-google-plus-official:before {
                content: "\f2b3";
            }
            .fa-fa:before,
            .fa-font-awesome:before {
                content: "\f2b4";
            }
            .fa-handshake-o:before {
                content: "\f2b5";
            }
            .fa-envelope-open:before {
                content: "\f2b6";
            }
            .fa-envelope-open-o:before {
                content: "\f2b7";
            }
            .fa-linode:before {
                content: "\f2b8";
            }
            .fa-address-book:before {
                content: "\f2b9";
            }
            .fa-address-book-o:before {
                content: "\f2ba";
            }
            .fa-vcard:before,
            .fa-address-card:before {
                content: "\f2bb";
            }
            .fa-vcard-o:before,
            .fa-address-card-o:before {
                content: "\f2bc";
            }
            .fa-user-circle:before {
                content: "\f2bd";
            }
            .fa-user-circle-o:before {
                content: "\f2be";
            }
            .fa-user-o:before {
                content: "\f2c0";
            }
            .fa-id-badge:before {
                content: "\f2c1";
            }
            .fa-drivers-license:before,
            .fa-id-card:before {
                content: "\f2c2";
            }
            .fa-drivers-license-o:before,
            .fa-id-card-o:before {
                content: "\f2c3";
            }
            .fa-quora:before {
                content: "\f2c4";
            }
            .fa-free-code-camp:before {
                content: "\f2c5";
            }
            .fa-telegram:before {
                content: "\f2c6";
            }
            .fa-thermometer-4:before,
            .fa-thermometer:before,
            .fa-thermometer-full:before {
                content: "\f2c7";
            }
            .fa-thermometer-3:before,
            .fa-thermometer-three-quarters:before {
                content: "\f2c8";
            }
            .fa-thermometer-2:before,
            .fa-thermometer-half:before {
                content: "\f2c9";
            }
            .fa-thermometer-1:before,
            .fa-thermometer-quarter:before {
                content: "\f2ca";
            }
            .fa-thermometer-0:before,
            .fa-thermometer-empty:before {
                content: "\f2cb";
            }
            .fa-shower:before {
                content: "\f2cc";
            }
            .fa-bathtub:before,
            .fa-s15:before,
            .fa-bath:before {
                content: "\f2cd";
            }
            .fa-podcast:before {
                content: "\f2ce";
            }
            .fa-window-maximize:before {
                content: "\f2d0";
            }
            .fa-window-minimize:before {
                content: "\f2d1";
            }
            .fa-window-restore:before {
                content: "\f2d2";
            }
            .fa-times-rectangle:before,
            .fa-window-close:before {
                content: "\f2d3";
            }
            .fa-times-rectangle-o:before,
            .fa-window-close-o:before {
                content: "\f2d4";
            }
            .fa-bandcamp:before {
                content: "\f2d5";
            }
            .fa-grav:before {
                content: "\f2d6";
            }
            .fa-etsy:before {
                content: "\f2d7";
            }
            .fa-imdb:before {
                content: "\f2d8";
            }
            .fa-ravelry:before {
                content: "\f2d9";
            }
            .fa-eercast:before {
                content: "\f2da";
            }
            .fa-microchip:before {
                content: "\f2db";
            }
            .fa-snowflake-o:before {
                content: "\f2dc";
            }
            .fa-superpowers:before {
                content: "\f2dd";
            }
            .fa-wpexplorer:before {
                content: "\f2de";
            }
            .fa-meetup:before {
                content: "\f2e0";
            }
            .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                border: 0;
            }
            .sr-only-focusable:active,
            .sr-only-focusable:focus {
                position: static;
                width: auto;
                height: auto;
                margin: 0;
                overflow: visible;
                clip: auto;
            }

        </style>
        <style>
            @charset "UTF-8";

            /*!
             * animate.css -http://daneden.me/animate
             * Version - 3.5.2
             * Licensed under the MIT license - http://opensource.org/licenses/MIT
             *
             * Copyright (c) 2017 Daniel Eden
             */

            .animated {
                animation-duration: 1s;
                animation-fill-mode: both;
            }

            .animated.infinite {
                animation-iteration-count: infinite;
            }

            .animated.hinge {
                animation-duration: 2s;
            }

            .animated.flipOutX,
            .animated.flipOutY,
            .animated.bounceIn,
            .animated.bounceOut {
                animation-duration: .75s;
            }

            @keyframes bounce {
                from, 20%, 53%, 80%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                    transform: translate3d(0,0,0);
                }

                40%, 43% {
                    animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                    transform: translate3d(0, -30px, 0);
                }

                70% {
                    animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                    transform: translate3d(0, -15px, 0);
                }

                90% {
                    transform: translate3d(0,-4px,0);
                }
            }

            .bounce {
                animation-name: bounce;
                transform-origin: center bottom;
            }

            @keyframes flash {
                from, 50%, to {
                    opacity: 1;
                }

                25%, 75% {
                    opacity: 0;
                }
            }

            .flash {
                animation-name: flash;
            }

            /* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

            @keyframes pulse {
                from {
                    transform: scale3d(1, 1, 1);
                }

                50% {
                    transform: scale3d(1.05, 1.05, 1.05);
                }

                to {
                    transform: scale3d(1, 1, 1);
                }
            }

            .pulse {
                animation-name: pulse;
            }

            @keyframes rubberBand {
                from {
                    transform: scale3d(1, 1, 1);
                }

                30% {
                    transform: scale3d(1.25, 0.75, 1);
                }

                40% {
                    transform: scale3d(0.75, 1.25, 1);
                }

                50% {
                    transform: scale3d(1.15, 0.85, 1);
                }

                65% {
                    transform: scale3d(.95, 1.05, 1);
                }

                75% {
                    transform: scale3d(1.05, .95, 1);
                }

                to {
                    transform: scale3d(1, 1, 1);
                }
            }

            .rubberBand {
                animation-name: rubberBand;
            }

            @keyframes shake {
                from, to {
                    transform: translate3d(0, 0, 0);
                }

                10%, 30%, 50%, 70%, 90% {
                    transform: translate3d(-10px, 0, 0);
                }

                20%, 40%, 60%, 80% {
                    transform: translate3d(10px, 0, 0);
                }
            }

            .shake {
                animation-name: shake;
            }

            @keyframes headShake {
                0% {
                    transform: translateX(0);
                }

                6.5% {
                    transform: translateX(-6px) rotateY(-9deg);
                }

                18.5% {
                    transform: translateX(5px) rotateY(7deg);
                }

                31.5% {
                    transform: translateX(-3px) rotateY(-5deg);
                }

                43.5% {
                    transform: translateX(2px) rotateY(3deg);
                }

                50% {
                    transform: translateX(0);
                }
            }

            .headShake {
                animation-timing-function: ease-in-out;
                animation-name: headShake;
            }

            @keyframes swing {
                20% {
                    transform: rotate3d(0, 0, 1, 15deg);
                }

                40% {
                    transform: rotate3d(0, 0, 1, -10deg);
                }

                60% {
                    transform: rotate3d(0, 0, 1, 5deg);
                }

                80% {
                    transform: rotate3d(0, 0, 1, -5deg);
                }

                to {
                    transform: rotate3d(0, 0, 1, 0deg);
                }
            }

            .swing {
                transform-origin: top center;
                animation-name: swing;
            }

            @keyframes tada {
                from {
                    transform: scale3d(1, 1, 1);
                }

                10%, 20% {
                    transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
                }

                30%, 50%, 70%, 90% {
                    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
                }

                40%, 60%, 80% {
                    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
                }

                to {
                    transform: scale3d(1, 1, 1);
                }
            }

            .tada {
                animation-name: tada;
            }

            /* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

            @keyframes wobble {
                from {
                    transform: none;
                }

                15% {
                    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
                }

                30% {
                    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
                }

                45% {
                    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
                }

                60% {
                    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
                }

                75% {
                    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
                }

                to {
                    transform: none;
                }
            }

            .wobble {
                animation-name: wobble;
            }

            @keyframes jello {
                from, 11.1%, to {
                    transform: none;
                }

                22.2% {
                    transform: skewX(-12.5deg) skewY(-12.5deg);
                }

                33.3% {
                    transform: skewX(6.25deg) skewY(6.25deg);
                }

                44.4% {
                    transform: skewX(-3.125deg) skewY(-3.125deg);
                }

                55.5% {
                    transform: skewX(1.5625deg) skewY(1.5625deg);
                }

                66.6% {
                    transform: skewX(-0.78125deg) skewY(-0.78125deg);
                }

                77.7% {
                    transform: skewX(0.390625deg) skewY(0.390625deg);
                }

                88.8% {
                    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);
                }
            }

            .jello {
                animation-name: jello;
                transform-origin: center;
            }

            @keyframes bounceIn {
                from, 20%, 40%, 60%, 80%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }

                0% {
                    opacity: 0;
                    transform: scale3d(.3, .3, .3);
                }

                20% {
                    transform: scale3d(1.1, 1.1, 1.1);
                }

                40% {
                    transform: scale3d(.9, .9, .9);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(1.03, 1.03, 1.03);
                }

                80% {
                    transform: scale3d(.97, .97, .97);
                }

                to {
                    opacity: 1;
                    transform: scale3d(1, 1, 1);
                }
            }

            .bounceIn {
                animation-name: bounceIn;
            }

            @keyframes bounceInDown {
                from, 60%, 75%, 90%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }

                0% {
                    opacity: 0;
                    transform: translate3d(0, -3000px, 0);
                }

                60% {
                    opacity: 1;
                    transform: translate3d(0, 25px, 0);
                }

                75% {
                    transform: translate3d(0, -10px, 0);
                }

                90% {
                    transform: translate3d(0, 5px, 0);
                }

                to {
                    transform: none;
                }
            }

            .bounceInDown {
                animation-name: bounceInDown;
            }

            @keyframes bounceInLeft {
                from, 60%, 75%, 90%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }

                0% {
                    opacity: 0;
                    transform: translate3d(-3000px, 0, 0);
                }

                60% {
                    opacity: 1;
                    transform: translate3d(25px, 0, 0);
                }

                75% {
                    transform: translate3d(-10px, 0, 0);
                }

                90% {
                    transform: translate3d(5px, 0, 0);
                }

                to {
                    transform: none;
                }
            }

            .bounceInLeft {
                animation-name: bounceInLeft;
            }

            @keyframes bounceInRight {
                from, 60%, 75%, 90%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }

                from {
                    opacity: 0;
                    transform: translate3d(3000px, 0, 0);
                }

                60% {
                    opacity: 1;
                    transform: translate3d(-25px, 0, 0);
                }

                75% {
                    transform: translate3d(10px, 0, 0);
                }

                90% {
                    transform: translate3d(-5px, 0, 0);
                }

                to {
                    transform: none;
                }
            }

            .bounceInRight {
                animation-name: bounceInRight;
            }

            @keyframes bounceInUp {
                from, 60%, 75%, 90%, to {
                    animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                }

                from {
                    opacity: 0;
                    transform: translate3d(0, 3000px, 0);
                }

                60% {
                    opacity: 1;
                    transform: translate3d(0, -20px, 0);
                }

                75% {
                    transform: translate3d(0, 10px, 0);
                }

                90% {
                    transform: translate3d(0, -5px, 0);
                }

                to {
                    transform: translate3d(0, 0, 0);
                }
            }

            .bounceInUp {
                animation-name: bounceInUp;
            }

            @keyframes bounceOut {
                20% {
                    transform: scale3d(.9, .9, .9);
                }

                50%, 55% {
                    opacity: 1;
                    transform: scale3d(1.1, 1.1, 1.1);
                }

                to {
                    opacity: 0;
                    transform: scale3d(.3, .3, .3);
                }
            }

            .bounceOut {
                animation-name: bounceOut;
            }

            @keyframes bounceOutDown {
                20% {
                    transform: translate3d(0, 10px, 0);
                }

                40%, 45% {
                    opacity: 1;
                    transform: translate3d(0, -20px, 0);
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, 2000px, 0);
                }
            }

            .bounceOutDown {
                animation-name: bounceOutDown;
            }

            @keyframes bounceOutLeft {
                20% {
                    opacity: 1;
                    transform: translate3d(20px, 0, 0);
                }

                to {
                    opacity: 0;
                    transform: translate3d(-2000px, 0, 0);
                }
            }

            .bounceOutLeft {
                animation-name: bounceOutLeft;
            }

            @keyframes bounceOutRight {
                20% {
                    opacity: 1;
                    transform: translate3d(-20px, 0, 0);
                }

                to {
                    opacity: 0;
                    transform: translate3d(2000px, 0, 0);
                }
            }

            .bounceOutRight {
                animation-name: bounceOutRight;
            }

            @keyframes bounceOutUp {
                20% {
                    transform: translate3d(0, -10px, 0);
                }

                40%, 45% {
                    opacity: 1;
                    transform: translate3d(0, 20px, 0);
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, -2000px, 0);
                }
            }

            .bounceOutUp {
                animation-name: bounceOutUp;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            .fadeIn {
                animation-name: fadeIn;
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translate3d(0, -100%, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInDown {
                animation-name: fadeInDown;
            }

            @keyframes fadeInDownBig {
                from {
                    opacity: 0;
                    transform: translate3d(0, -2000px, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInDownBig {
                animation-name: fadeInDownBig;
            }

            @keyframes fadeInLeft {
                from {
                    opacity: 0;
                    transform: translate3d(-100%, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInLeft {
                animation-name: fadeInLeft;
            }

            @keyframes fadeInLeftBig {
                from {
                    opacity: 0;
                    transform: translate3d(-2000px, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInLeftBig {
                animation-name: fadeInLeftBig;
            }

            @keyframes fadeInRight {
                from {
                    opacity: 0;
                    transform: translate3d(100%, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInRight {
                animation-name: fadeInRight;
            }

            @keyframes fadeInRightBig {
                from {
                    opacity: 0;
                    transform: translate3d(2000px, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInRightBig {
                animation-name: fadeInRightBig;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translate3d(0, 100%, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInUp {
                animation-name: fadeInUp;
            }

            @keyframes fadeInUpBig {
                from {
                    opacity: 0;
                    transform: translate3d(0, 2000px, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .fadeInUpBig {
                animation-name: fadeInUpBig;
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                }
            }

            .fadeOut {
                animation-name: fadeOut;
            }

            @keyframes fadeOutDown {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, 100%, 0);
                }
            }

            .fadeOutDown {
                animation-name: fadeOutDown;
            }

            @keyframes fadeOutDownBig {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, 2000px, 0);
                }
            }

            .fadeOutDownBig {
                animation-name: fadeOutDownBig;
            }

            @keyframes fadeOutLeft {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(-100%, 0, 0);
                }
            }

            .fadeOutLeft {
                animation-name: fadeOutLeft;
            }

            @keyframes fadeOutLeftBig {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(-2000px, 0, 0);
                }
            }

            .fadeOutLeftBig {
                animation-name: fadeOutLeftBig;
            }

            @keyframes fadeOutRight {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(100%, 0, 0);
                }
            }

            .fadeOutRight {
                animation-name: fadeOutRight;
            }

            @keyframes fadeOutRightBig {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(2000px, 0, 0);
                }
            }

            .fadeOutRightBig {
                animation-name: fadeOutRightBig;
            }

            @keyframes fadeOutUp {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, -100%, 0);
                }
            }

            .fadeOutUp {
                animation-name: fadeOutUp;
            }

            @keyframes fadeOutUpBig {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(0, -2000px, 0);
                }
            }

            .fadeOutUpBig {
                animation-name: fadeOutUpBig;
            }

            @keyframes flip {
                from {
                    transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
                    animation-timing-function: ease-out;
                }

                40% {
                    transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
                    animation-timing-function: ease-out;
                }

                50% {
                    transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
                    animation-timing-function: ease-in;
                }

                80% {
                    transform: perspective(400px) scale3d(.95, .95, .95);
                    animation-timing-function: ease-in;
                }

                to {
                    transform: perspective(400px);
                    animation-timing-function: ease-in;
                }
            }

            .animated.flip {
                -webkit-backface-visibility: visible;
                backface-visibility: visible;
                animation-name: flip;
            }

            @keyframes flipInX {
                from {
                    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                    animation-timing-function: ease-in;
                    opacity: 0;
                }

                40% {
                    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                    animation-timing-function: ease-in;
                }

                60% {
                    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                    opacity: 1;
                }

                80% {
                    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
                }

                to {
                    transform: perspective(400px);
                }
            }

            .flipInX {
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
                animation-name: flipInX;
            }

            @keyframes flipInY {
                from {
                    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                    animation-timing-function: ease-in;
                    opacity: 0;
                }

                40% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
                    animation-timing-function: ease-in;
                }

                60% {
                    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
                    opacity: 1;
                }

                80% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
                }

                to {
                    transform: perspective(400px);
                }
            }

            .flipInY {
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
                animation-name: flipInY;
            }

            @keyframes flipOutX {
                from {
                    transform: perspective(400px);
                }

                30% {
                    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                    opacity: 1;
                }

                to {
                    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                    opacity: 0;
                }
            }

            .flipOutX {
                animation-name: flipOutX;
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
            }

            @keyframes flipOutY {
                from {
                    transform: perspective(400px);
                }

                30% {
                    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
                    opacity: 1;
                }

                to {
                    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                    opacity: 0;
                }
            }

            .flipOutY {
                -webkit-backface-visibility: visible !important;
                backface-visibility: visible !important;
                animation-name: flipOutY;
            }

            @keyframes lightSpeedIn {
                from {
                    transform: translate3d(100%, 0, 0) skewX(-30deg);
                    opacity: 0;
                }

                60% {
                    transform: skewX(20deg);
                    opacity: 1;
                }

                80% {
                    transform: skewX(-5deg);
                    opacity: 1;
                }

                to {
                    transform: none;
                    opacity: 1;
                }
            }

            .lightSpeedIn {
                animation-name: lightSpeedIn;
                animation-timing-function: ease-out;
            }

            @keyframes lightSpeedOut {
                from {
                    opacity: 1;
                }

                to {
                    transform: translate3d(100%, 0, 0) skewX(30deg);
                    opacity: 0;
                }
            }

            .lightSpeedOut {
                animation-name: lightSpeedOut;
                animation-timing-function: ease-in;
            }

            @keyframes rotateIn {
                from {
                    transform-origin: center;
                    transform: rotate3d(0, 0, 1, -200deg);
                    opacity: 0;
                }

                to {
                    transform-origin: center;
                    transform: none;
                    opacity: 1;
                }
            }

            .rotateIn {
                animation-name: rotateIn;
            }

            @keyframes rotateInDownLeft {
                from {
                    transform-origin: left bottom;
                    transform: rotate3d(0, 0, 1, -45deg);
                    opacity: 0;
                }

                to {
                    transform-origin: left bottom;
                    transform: none;
                    opacity: 1;
                }
            }

            .rotateInDownLeft {
                animation-name: rotateInDownLeft;
            }

            @keyframes rotateInDownRight {
                from {
                    transform-origin: right bottom;
                    transform: rotate3d(0, 0, 1, 45deg);
                    opacity: 0;
                }

                to {
                    transform-origin: right bottom;
                    transform: none;
                    opacity: 1;
                }
            }

            .rotateInDownRight {
                animation-name: rotateInDownRight;
            }

            @keyframes rotateInUpLeft {
                from {
                    transform-origin: left bottom;
                    transform: rotate3d(0, 0, 1, 45deg);
                    opacity: 0;
                }

                to {
                    transform-origin: left bottom;
                    transform: none;
                    opacity: 1;
                }
            }

            .rotateInUpLeft {
                animation-name: rotateInUpLeft;
            }

            @keyframes rotateInUpRight {
                from {
                    transform-origin: right bottom;
                    transform: rotate3d(0, 0, 1, -90deg);
                    opacity: 0;
                }

                to {
                    transform-origin: right bottom;
                    transform: none;
                    opacity: 1;
                }
            }

            .rotateInUpRight {
                animation-name: rotateInUpRight;
            }

            @keyframes rotateOut {
                from {
                    transform-origin: center;
                    opacity: 1;
                }

                to {
                    transform-origin: center;
                    transform: rotate3d(0, 0, 1, 200deg);
                    opacity: 0;
                }
            }

            .rotateOut {
                animation-name: rotateOut;
            }

            @keyframes rotateOutDownLeft {
                from {
                    transform-origin: left bottom;
                    opacity: 1;
                }

                to {
                    transform-origin: left bottom;
                    transform: rotate3d(0, 0, 1, 45deg);
                    opacity: 0;
                }
            }

            .rotateOutDownLeft {
                animation-name: rotateOutDownLeft;
            }

            @keyframes rotateOutDownRight {
                from {
                    transform-origin: right bottom;
                    opacity: 1;
                }

                to {
                    transform-origin: right bottom;
                    transform: rotate3d(0, 0, 1, -45deg);
                    opacity: 0;
                }
            }

            .rotateOutDownRight {
                animation-name: rotateOutDownRight;
            }

            @keyframes rotateOutUpLeft {
                from {
                    transform-origin: left bottom;
                    opacity: 1;
                }

                to {
                    transform-origin: left bottom;
                    transform: rotate3d(0, 0, 1, -45deg);
                    opacity: 0;
                }
            }

            .rotateOutUpLeft {
                animation-name: rotateOutUpLeft;
            }

            @keyframes rotateOutUpRight {
                from {
                    transform-origin: right bottom;
                    opacity: 1;
                }

                to {
                    transform-origin: right bottom;
                    transform: rotate3d(0, 0, 1, 90deg);
                    opacity: 0;
                }
            }

            .rotateOutUpRight {
                animation-name: rotateOutUpRight;
            }

            @keyframes hinge {
                0% {
                    transform-origin: top left;
                    animation-timing-function: ease-in-out;
                }

                20%, 60% {
                    transform: rotate3d(0, 0, 1, 80deg);
                    transform-origin: top left;
                    animation-timing-function: ease-in-out;
                }

                40%, 80% {
                    transform: rotate3d(0, 0, 1, 60deg);
                    transform-origin: top left;
                    animation-timing-function: ease-in-out;
                    opacity: 1;
                }

                to {
                    transform: translate3d(0, 700px, 0);
                    opacity: 0;
                }
            }

            .hinge {
                animation-name: hinge;
            }

            @keyframes jackInTheBox {
                from {
                    opacity: 0;
                    transform: scale(0.1) rotate(30deg);
                    transform-origin: center bottom;
                }

                50% {
                    transform: rotate(-10deg);
                }

                70% {
                    transform: rotate(3deg);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .jackInTheBox {
                animation-name: jackInTheBox;
            }

            /* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

            @keyframes rollIn {
                from {
                    opacity: 0;
                    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            .rollIn {
                animation-name: rollIn;
            }

            /* originally authored by Nick Pettit - https://github.com/nickpettit/glide */

            @keyframes rollOut {
                from {
                    opacity: 1;
                }

                to {
                    opacity: 0;
                    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
                }
            }

            .rollOut {
                animation-name: rollOut;
            }

            @keyframes zoomIn {
                from {
                    opacity: 0;
                    transform: scale3d(.3, .3, .3);
                }

                50% {
                    opacity: 1;
                }
            }

            .zoomIn {
                animation-name: zoomIn;
            }

            @keyframes zoomInDown {
                from {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomInDown {
                animation-name: zoomInDown;
            }

            @keyframes zoomInLeft {
                from {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomInLeft {
                animation-name: zoomInLeft;
            }

            @keyframes zoomInRight {
                from {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomInRight {
                animation-name: zoomInRight;
            }

            @keyframes zoomInUp {
                from {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomInUp {
                animation-name: zoomInUp;
            }

            @keyframes zoomOut {
                from {
                    opacity: 1;
                }

                50% {
                    opacity: 0;
                    transform: scale3d(.3, .3, .3);
                }

                to {
                    opacity: 0;
                }
            }

            .zoomOut {
                animation-name: zoomOut;
            }

            @keyframes zoomOutDown {
                40% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                to {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
                    transform-origin: center bottom;
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomOutDown {
                animation-name: zoomOutDown;
            }

            @keyframes zoomOutLeft {
                40% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
                }

                to {
                    opacity: 0;
                    transform: scale(.1) translate3d(-2000px, 0, 0);
                    transform-origin: left center;
                }
            }

            .zoomOutLeft {
                animation-name: zoomOutLeft;
            }

            @keyframes zoomOutRight {
                40% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0);
                }

                to {
                    opacity: 0;
                    transform: scale(.1) translate3d(2000px, 0, 0);
                    transform-origin: right center;
                }
            }

            .zoomOutRight {
                animation-name: zoomOutRight;
            }

            @keyframes zoomOutUp {
                40% {
                    opacity: 1;
                    transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
                    animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
                }

                to {
                    opacity: 0;
                    transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
                    transform-origin: center bottom;
                    animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1);
                }
            }

            .zoomOutUp {
                animation-name: zoomOutUp;
            }

            @keyframes slideInDown {
                from {
                    transform: translate3d(0, -100%, 0);
                    visibility: visible;
                }

                to {
                    transform: translate3d(0, 0, 0);
                }
            }

            .slideInDown {
                animation-name: slideInDown;
            }

            @keyframes slideInLeft {
                from {
                    transform: translate3d(-100%, 0, 0);
                    visibility: visible;
                }

                to {
                    transform: translate3d(0, 0, 0);
                }
            }

            .slideInLeft {
                animation-name: slideInLeft;
            }

            @keyframes slideInRight {
                from {
                    transform: translate3d(100%, 0, 0);
                    visibility: visible;
                }

                to {
                    transform: translate3d(0, 0, 0);
                }
            }

            .slideInRight {
                animation-name: slideInRight;
            }

            @keyframes slideInUp {
                from {
                    transform: translate3d(0, 100%, 0);
                    visibility: visible;
                }

                to {
                    transform: translate3d(0, 0, 0);
                }
            }

            .slideInUp {
                animation-name: slideInUp;
            }

            @keyframes slideOutDown {
                from {
                    transform: translate3d(0, 0, 0);
                }

                to {
                    visibility: hidden;
                    transform: translate3d(0, 100%, 0);
                }
            }

            .slideOutDown {
                animation-name: slideOutDown;
            }

            @keyframes slideOutLeft {
                from {
                    transform: translate3d(0, 0, 0);
                }

                to {
                    visibility: hidden;
                    transform: translate3d(-100%, 0, 0);
                }
            }

            .slideOutLeft {
                animation-name: slideOutLeft;
            }

            @keyframes slideOutRight {
                from {
                    transform: translate3d(0, 0, 0);
                }

                to {
                    visibility: hidden;
                    transform: translate3d(100%, 0, 0);
                }
            }

            .slideOutRight {
                animation-name: slideOutRight;
            }

            @keyframes slideOutUp {
                from {
                    transform: translate3d(0, 0, 0);
                }

                to {
                    visibility: hidden;
                    transform: translate3d(0, -100%, 0);
                }
            }

            .slideOutUp {
                animation-name: slideOutUp;
            }

        </style>
        <style>
            /*
  Theme Name: Regna
  Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  Author: BootstrapMade.com
  License: https://bootstrapmade.com/license/
*/
            /*--------------------------------------------------------------
            # General
            --------------------------------------------------------------*/
            body {
                background: #fff;
                color: #666666;
                font-family: "Open Sans", sans-serif;
            }

            a {
                color: #2dc997;
            }

            a:hover, a:active, a:focus {
                color: #2dca98;
                outline: none;
                text-decoration: none;
            }

            p {
                padding: 0;
                margin: 0 0 30px 0;
            }

            h1, h2, h3, h4, h5, h6 {
                font-family: "Poppins", sans-serif;
                font-weight: 400;
                margin: 0 0 20px 0;
                padding: 0;
            }

            /* Prelaoder */
            #preloader {
                position: fixed;
                left: 0;
                top: 0;
                z-index: 999;
                width: 100%;
                height: 100%;
                overflow: visible;
                background: #fff url("../img/preloader.svg") no-repeat center center;
            }

            /* Back to top button */
            .back-to-top {
                position: fixed;
                display: none;
                background: rgba(0, 0, 0, 0.2);
                color: #fff;
                padding: 6px 12px 9px 12px;
                font-size: 16px;
                border-radius: 2px;
                right: 15px;
                bottom: 15px;
                transition: background 0.5s;
            }

            @media (max-width: 768px) {
                .back-to-top {
                    bottom: 15px;
                }
            }

            .back-to-top:focus {
                background: rgba(0, 0, 0, 0.2);
                color: #fff;
                outline: none;
            }

            .back-to-top:hover {
                background: #2dc997;
                color: #fff;
            }

            /*--------------------------------------------------------------
            # Header
            --------------------------------------------------------------*/
            #header {
                padding: 30px 0;
                height: 92px;
                position: fixed;
                left: 0;
                top: 0;
                right: 0;
                transition: all 0.5s;
                z-index: 997;
            }

            #header #logo {
                float: left;
            }

            #header #logo h1 {
                font-size: 36px;
                margin: 0;
                padding: 6px 0;
                line-height: 1;
                font-family: "Poppins", sans-serif;
                font-weight: 700;
                letter-spacing: 3px;
                text-transform: uppercase;
            }

            #header #logo h1 a, #header #logo h1 a:hover {
                color: #fff;
            }

            #header #logo img {
                padding: 0;
                margin: 0;
            }

            @media (max-width: 768px) {
                #header #logo h1 {
                    font-size: 26px;
                }
                #header #logo img {
                    max-height: 40px;
                }
            }

            #header.header-fixed {
                background: rgba(52, 59, 64, 0.9);
                padding: 20px 0;
                height: 72px;
                transition: all 0.5s;
            }

            /*--------------------------------------------------------------
            # Hero Section
            --------------------------------------------------------------*/
            #hero {
                display: table;
                width: 100%;
                height: 100vh;
                background: url("https://chicasongroup.com/wp-content/uploads/revslider/home5/wave2.png") top center fixed;
                background-size: cover;
            }

            #hero .hero-container {
                background: rgba(0, 0, 0, 0.6);
                display: table-cell;
                margin: 0;
                padding: 0 10px;
                text-align: center;
                vertical-align: middle;
            }

            #hero h1 {
                margin: 30px 0 10px 0;
                font-size: 48px;
                font-weight: 700;
                line-height: 56px;
                text-transform: uppercase;
                color: #fff;
            }

            @media (max-width: 768px) {
                #hero h1 {
                    font-size: 28px;
                    line-height: 36px;
                }
            }

            #hero h2 {
                color: #eee;
                margin-bottom: 50px;
                font-size: 24px;
            }

            @media (max-width: 768px) {
                #hero h2 {
                    font-size: 18px;
                    line-height: 24px;
                    margin-bottom: 30px;
                }
            }

            #hero .btn-get-started {
                font-family: "Poppins", sans-serif;
                text-transform: uppercase;
                font-weight: 500;
                font-size: 16px;
                letter-spacing: 1px;
                display: inline-block;
                padding: 8px 28px;
                border-radius: 50px;
                transition: 0.5s;
                margin: 10px;
                border: 2px solid #fff;
                color: #fff;
            }

            #hero .btn-get-started:hover {
                background: #2dc997;
                border: 2px solid #2dc997;
            }

            /*--------------------------------------------------------------
            # Navigation Menu
            --------------------------------------------------------------*/
            /* Nav Menu Essentials */
            .nav-menu, .nav-menu * {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .nav-menu ul {
                position: absolute;
                display: none;
                top: 100%;
                left: 0;
                z-index: 99;
            }

            .nav-menu li {
                position: relative;
                white-space: nowrap;
            }

            .nav-menu > li {
                float: left;
            }

            .nav-menu li:hover > ul,
            .nav-menu li.sfHover > ul {
                display: block;
            }

            .nav-menu ul ul {
                top: 0;
                left: 100%;
            }

            .nav-menu ul li {
                min-width: 180px;
            }

            /* Nav Menu Arrows */
            .sf-arrows .sf-with-ul {
                padding-right: 30px;
            }

            .sf-arrows .sf-with-ul:after {
                content: "\f107";
                position: absolute;
                right: 15px;
                font-family: FontAwesome;
                font-style: normal;
                font-weight: normal;
            }

            .sf-arrows ul .sf-with-ul:after {
                content: "\f105";
            }

            /* Nav Meu Container */
            #nav-menu-container {
                float: right;
                margin: 0;
            }

            @media (max-width: 768px) {
                #nav-menu-container {
                    display: none;
                }
            }

            /* Nav Meu Styling */
            .nav-menu a {
                padding: 0 8px 10px 8px;
                text-decoration: none;
                display: inline-block;
                color: #fff;
                font-family: "Poppins", sans-serif;
                font-weight: 400;
                text-transform: uppercase;
                font-size: 13px;
                outline: none;
            }

            .nav-menu > li {
                margin-left: 10px;
            }

            .nav-menu > li > a:before {
                content: "";
                position: absolute;
                width: 100%;
                height: 2px;
                bottom: 0;
                left: 0;
                background-color: #2dc997;
                visibility: hidden;
                -webkit-transform: scaleX(0);
                transform: scaleX(0);
                -webkit-transition: all 0.3s ease-in-out 0s;
                transition: all 0.3s ease-in-out 0s;
            }

            .nav-menu a:hover:before, .nav-menu li:hover > a:before, .nav-menu .menu-active > a:before {
                visibility: visible;
                -webkit-transform: scaleX(1);
                transform: scaleX(1);
            }

            .nav-menu ul {
                margin: 4px 0 0 0;
                border: 1px solid #e7e7e7;
            }

            .nav-menu ul li {
                background: #fff;
            }

            .nav-menu ul li:first-child {
                border-top: 0;
            }

            .nav-menu ul li a {
                padding: 10px;
                color: #333;
                transition: 0.3s;
                display: block;
                font-size: 13px;
                text-transform: none;
            }

            .nav-menu ul li a:hover {
                background: #2dc997;
                color: #fff;
            }

            .nav-menu ul ul {
                margin: 0;
            }

            /* Mobile Nav Toggle */
            #mobile-nav-toggle {
                position: fixed;
                right: 0;
                top: 0;
                z-index: 999;
                margin: 20px 20px 0 0;
                border: 0;
                background: none;
                font-size: 24px;
                display: none;
                transition: all 0.4s;
                outline: none;
                cursor: pointer;
            }

            #mobile-nav-toggle i {
                color: #fff;
            }

            @media (max-width: 768px) {
                #mobile-nav-toggle {
                    display: inline;
                }
            }

            /* Mobile Nav Styling */
            #mobile-nav {
                position: fixed;
                top: 0;
                padding-top: 18px;
                bottom: 0;
                z-index: 998;
                background: rgba(52, 59, 64, 0.9);
                left: -260px;
                width: 260px;
                overflow-y: auto;
                transition: 0.4s;
            }

            #mobile-nav ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            #mobile-nav ul li {
                position: relative;
            }

            #mobile-nav ul li a {
                color: #fff;
                font-size: 16px;
                overflow: hidden;
                padding: 10px 22px 10px 15px;
                position: relative;
                text-decoration: none;
                width: 100%;
                display: block;
                outline: none;
            }

            #mobile-nav ul li a:hover {
                color: #fff;
            }

            #mobile-nav ul li li {
                padding-left: 30px;
            }

            #mobile-nav ul .menu-has-children i {
                position: absolute;
                right: 0;
                z-index: 99;
                padding: 15px;
                cursor: pointer;
                color: #fff;
            }

            #mobile-nav ul .menu-has-children i.fa-chevron-up {
                color: #2dc997;
            }

            #mobile-nav ul .menu-item-active {
                color: #2dc997;
            }

            #mobile-body-overly {
                width: 100%;
                height: 100%;
                z-index: 997;
                top: 0;
                left: 0;
                position: fixed;
                background: rgba(52, 59, 64, 0.9);
                display: none;
            }

            /* Mobile Nav body classes */
            body.mobile-nav-active {
                overflow: hidden;
            }

            body.mobile-nav-active #mobile-nav {
                left: 0;
            }

            body.mobile-nav-active #mobile-nav-toggle {
                color: #fff;
            }

            /*--------------------------------------------------------------
            # Sections
            --------------------------------------------------------------*/
            /* Sections Header
            --------------------------------*/
            .section-header .section-title {
                font-size: 32px;
                color: #111;
                text-transform: uppercase;
                text-align: center;
                font-weight: 700;
                margin-bottom: 5px;
            }

            .section-header .section-description {
                text-align: center;
                padding-bottom: 40px;
                color: #999;
            }

            /* About Us Section
            --------------------------------*/
            #about {
                background: #fff;
                padding: 80px 0;
            }

            #about .about-container .background {
                min-height: 300px;
                background: url(../img/about-img.jpg) center top no-repeat;
                margin-bottom: 10px;
            }

            #about .about-container .content {
                background: #fff;
            }

            #about .about-container .title {
                color: #333;
                font-weight: 700;
                font-size: 32px;
            }

            @media (max-width: 768px) {
                #about .about-container .title {
                    padding-top: 15px;
                }
            }

            #about .about-container p {
                line-height: 26px;
            }

            #about .about-container p:last-child {
                margin-bottom: 0;
            }

            #about .about-container .icon-box {
                background: #fff;
                background-size: cover;
                padding: 0 0 30px 0;
            }

            #about .about-container .icon-box .icon {
                float: left;
                background: #fff;
                padding: 16px;
                border-radius: 50%;
                border: 2px solid #2dc997;
            }

            #about .about-container .icon-box .icon i {
                color: #2dc997;
                font-size: 24px;
            }

            #about .about-container .icon-box .title {
                margin-left: 80px;
                font-weight: 500;
                margin-bottom: 5px;
                font-size: 18px;
                text-transform: uppercase;
            }

            #about .about-container .icon-box .title a {
                color: #111;
            }

            #about .about-container .icon-box .description {
                margin-left: 80px;
                line-height: 24px;
                font-size: 14px;
            }

            /* Facts Section
            --------------------------------*/
            #facts {
                background: #f7f7f7;
                padding: 80px 0 60px 0;
            }

            #facts .counters span {
                font-size: 48px;
                display: block;
                color: #2dc997;
            }

            #facts .counters p {
                padding: 0;
                margin: 0 0 20px 0;
                font-family: "Poppins", sans-serif;
                font-size: 14px;
            }

            /* Services Section
            --------------------------------*/
            #services {
                background: #fff;
                background-size: cover;
                padding: 80px 0 60px 0;
            }

            #services .box {
                padding: 50px 20px;
                margin-bottom: 50px;
                text-align: center;
                border: 1px solid #e6e6e6;
                height: 200px;
                position: relative;
                background: #fafafa;
            }

            #services .icon {
                position: absolute;
                top: -36px;
                left: calc(50% - 36px);
                transition: 0.2s;
                border-radius: 50%;
                display: inline-block;
                border: 6px solid #fff;
            }

            #services .icon a {
                display: inline-block;
                background: #2dc997;
                border: 2px solid #2dc997;
                padding: 16px;
                border-radius: 50%;
                transition: 0.3s;
            }

            #services .icon i {
                color: #fff;
                font-size: 24px;
            }

            #services .box:hover .icon i {
                color: #2dc997;
            }

            #services .box:hover .icon a {
                color: #2dc997;
                background: #fff;
            }

            #services .title {
                font-weight: 700;
                font-size: 18px;
                margin-bottom: 15px;
                text-transform: uppercase;
            }

            #services .title a {
                color: #111;
            }

            #services .description {
                font-size: 14px;
                line-height: 24px;
            }

            /* Call To Action Section
            --------------------------------*/
            #call-to-action {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(../img/call-to-action-bg.jpg) fixed center center;
                background-size: cover;
                padding: 80px 0;
            }

            #call-to-action .cta-title {
                color: #fff;
                font-size: 28px;
                font-weight: 700;
            }

            #call-to-action .cta-text {
                color: #fff;
            }

            @media (min-width: 769px) {
                #call-to-action .cta-btn-container {
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                }
            }

            #call-to-action .cta-btn {
                font-family: "Poppins", sans-serif;
                text-transform: uppercase;
                font-weight: 500;
                font-size: 16px;
                letter-spacing: 1px;
                display: inline-block;
                padding: 8px 30px;
                border-radius: 50px;
                transition: 0.5s;
                margin: 10px;
                border: 2px solid #fff;
                color: #fff;
            }

            #call-to-action .cta-btn:hover {
                background: #2dc997;
                border: 2px solid #2dc997;
            }

            /* Portfolio Section
            --------------------------------*/
            #portfolio {
                background: #f7f7f7;
                padding: 80px 0;
            }

            #portfolio #portfolio-wrapper {
                padding-right: 15px;
            }

            #portfolio #portfolio-flters {
                padding: 0;
                margin: 0 0 45px 0;
                list-style: none;
                text-align: center;
            }

            #portfolio #portfolio-flters li {
                cursor: pointer;
                margin: 0 10px;
                display: inline-block;
                padding: 10px 22px;
                font-size: 12px;
                line-height: 20px;
                color: #666666;
                border-radius: 4px;
                text-transform: uppercase;
                background: #fff;
                margin-bottom: 5px;
                transition: all 0.3s ease-in-out;
            }

            #portfolio #portfolio-flters li:hover, #portfolio #portfolio-flters li.filter-active {
                background: #2dc997;
                color: #fff;
            }

            #portfolio .portfolio-item {
                position: relative;
                height: 200px;
                overflow: hidden !important;
                margin-bottom: 15px;
                transition: all 350ms ease;
                transform: scale(1);
            }

            #portfolio .portfolio-item a {
                display: block;
                margin-right: 15px;
            }

            #portfolio .portfolio-item img {
                position: relative;
                top: 0;
                transition: all 600ms cubic-bezier(0.645, 0.045, 0.355, 1);
            }

            #portfolio .portfolio-item .details {
                height: 50px;
                background: #2dc997;
                position: absolute;
                width: 100%;
                height: 50px;
                bottom: -50px;
                transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
            }

            #portfolio .portfolio-item .details h4 {
                font-size: 14px;
                font-weight: 700;
                color: #fff;
                padding: 8px 0 2px 8px;
                margin: 0;
            }

            #portfolio .portfolio-item .details span {
                display: block;
                color: #fff;
                font-size: 13px;
                padding-left: 8px;
            }

            #portfolio .portfolio-item:hover .details {
                bottom: 0;
            }

            #portfolio .portfolio-item:hover img {
                top: -30px;
            }

            /* Team Section
            --------------------------------*/
            #team {
                background: #fff;
                padding: 80px 0 60px 0;
            }

            #team .member {
                text-align: center;
                margin-bottom: 20px;
            }

            #team .member .pic {
                margin-bottom: 15px;
                overflow: hidden;
                height: 260px;
            }

            #team .member .pic img {
                max-width: 100%;
            }

            #team .member h4 {
                font-weight: 700;
                margin-bottom: 2px;
                font-size: 18px;
            }

            #team .member span {
                font-style: italic;
                display: block;
                font-size: 13px;
            }

            #team .member .social {
                margin-top: 15px;
            }

            #team .member .social a {
                color: #b3b3b3;
            }

            #team .member .social a:hover {
                color: #2dc997;
            }

            #team .member .social i {
                font-size: 18px;
                margin: 0 2px;
            }

            /* Contact Section
            --------------------------------*/
            #contact {
                background: #f7f7f7;
                padding: 80px 0 40px 0;
            }

            #contact #google-map {
                height: 300px;
                margin-bottom: 20px;
            }

            #contact .info {
                color: #333333;
            }

            #contact .info i {
                font-size: 32px;
                color: #2dc997;
                float: left;
            }

            #contact .info p {
                padding: 0 0 10px 50px;
                margin-bottom: 20px;
                line-height: 22px;
                font-size: 14px;
            }

            #contact .info .email p {
                padding-top: 5px;
            }

            #contact .social-links {
                padding-bottom: 20px;
            }

            #contact .social-links a {
                font-size: 18px;
                display: inline-block;
                background: #333;
                color: #fff;
                line-height: 1;
                padding: 8px 0;
                border-radius: 50%;
                text-align: center;
                width: 36px;
                height: 36px;
                transition: 0.3s;
            }

            #contact .social-links a:hover {
                background: #2dc997;
                color: #fff;
            }

            #contact .form #sendmessage {
                color: #2dc997;
                border: 1px solid #2dc997;
                display: none;
                text-align: center;
                padding: 15px;
                font-weight: 600;
                margin-bottom: 15px;
            }

            #contact .form #errormessage {
                color: red;
                display: none;
                border: 1px solid red;
                text-align: center;
                padding: 15px;
                font-weight: 600;
                margin-bottom: 15px;
            }

            #contact .form #sendmessage.show, #contact .form #errormessage.show, #contact .form .show {
                display: block;
            }

            #contact .form .validation {
                color: red;
                display: none;
                margin: 0 0 20px;
                font-weight: 400;
                font-size: 13px;
            }

            #contact .form input, #contact .form textarea {
                border-radius: 0;
                box-shadow: none;
                font-size: 14px;
            }

            #contact .form button[type="submit"] {
                background: #2dc997;
                border: 0;
                padding: 10px 24px;
                color: #fff;
                transition: 0.4s;
            }

            #contact .form button[type="submit"]:hover {
                background: #51d8ad;
            }

            /*--------------------------------------------------------------
            # Footer
            --------------------------------------------------------------*/
            #footer {
                background: #343b40;
                padding: 30px 0;
                color: #fff;
                font-size: 14px;
            }

            #footer .copyright {
                text-align: center;
            }

            #footer .credits {
                padding-top: 10px;
                text-align: center;
                font-size: 13px;
                color: #ccc;
            }

        </style>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <style>
    body {
      background: url(../img/1-w.jpg) repeat-y !important;
      -moz-background-size: 100%;
      -webkit-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
    }
    </style>

        <header id="header">
            <div class="container">

                <div id="logo" class="pull-left">
                    <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
                    <!-- Uncomment below if you prefer to use a text logo -->
                    <!--<h1><a href="#hero">Regna</a></h1>-->
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/">??????????????</a></li>
                        <? if(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['admin'] != null): ?>
                            <li><a href="/admin">??????????</a></li>
                        <? endif;?>
                        <? if(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['admin'] != null || Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['user'] != null): ?>
                        <li><a href="/queries/list">??????????????</a></li>
                        <? endif;?>
                        <? if(Yii::$app->user->isGuest):?>
                                <li><a href="/account/login">????????</a></li>
                                <li><a href="/account/register">??????????????????????</a> </li>
                        <? endif; ?>
                        <? if(!Yii::$app->user->isGuest):?>
                            <li><a href="/account/logout">??????????</a></li>
                        <? endif; ?>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->

        <!--==========================
          Hero Section
        ============================-->
        <section id="hero" >
            <div class="hero-container" >
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </section><!-- #hero -->

        <!--==========================
          Footer
        ============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">

                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Regna</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
                    -->
                    Bootstrap Templates by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </footer><!-- #footer -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
