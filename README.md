# AllinoneAccessibility

## Requires
ProcessWire >= 2.8.15
Haven't tested it myself on pw 2.8, and actually don't even know if there is 2.8.15. Thing is, it depends on [this fix](https://github.com/ryancramerdesign/ProcessWire/commit/2fe134b7b059fff023f0f37c7f172a9853c88af2) which was applied right before pw 3.0.16.

## NOTE!
This repo now includes a devns branch. Which is not a development version of this module, but rather meant to be used with Processwire 3.x devns as the only difference is the added namespace and therefore the requires flag in module info.

## Still considered Beta
Not widely tested, and config inputs already look like they're translatable but they're actually not yet saving!
**Thanks to Ryan the newest PW 3.0.15 devns fixes this issue**

## Problems with All in One Accessibility Widget not being set?
**Make sure to remember any settings!**
Please remove module and then install fresh copy of newest version.
Or update to latest version, then disable and enable module.

## Info about non-minified CSS & JS
The module only checks for minified style and script so if you make any changes either minify yourself and name file AllinoneAccessibility.min.css / AllinoneAccessibility.min.js or disable auto injection in settings and include them yourself
So the non-minified versions are only for development.
Minified CSS & JS have been added in version 0.1.2.


## What it does
All in One Accessibility widget improves Processwire website ADA compliance and browser experience for ADA, WCAG 2.1, Section 508, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, California Unruh, Ontario AODA, Canada ACA, German BITV, and France RGAA Standards.


## Features
* AJAX (deactivatable, JS disabled users will fall back to normal form submit with page reload, so fully functional without JS)
* 2 themes (dark/light)
* 8 positions (Top left/Top Center/Top Right/Middle left/Middle Right/Bottom left/Bottom Center/Bottom Right)
* 3 icon type (Accessibility/Wheelchair/Low Vision)
* 5 icon size (Big/Medium/Default/Small/Extra-Small)


## Installation
You can enter the class name *AllinoneAccessibility* in your back-ends module configs and it will download automatically
or get from [Processwires module directory]() or [Github]() and install it by unzipping and moving into your /site/modules/ folder or selecting the zip from your back-ends modules page.
