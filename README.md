Arizona Border Region
=====================

The website for Tucson & Southern Arizona Region of the Sports Car Club of America, region #88.

## About

The AZBR website is primarily HTML, CSS, and Javascript with a little bit of PHP sprinkled around. It uses [Bootstrap] for the majority of the styling, grid layout, and responsiveness.

The site relies on [Mind the Cones] for event information on the calendars and the registration information on the front page. Changes made to event dates or registration open &amp; close dates &amp; times appear automatically once saved in MTC. Events must be _public_ in MTC to show up on the front page or event calendars on the AZBR site.

[Bootstrap]: http://getbootstrap.com/docs/3.3/
[Mind the Cones]: http://www.mindthecones.com/

## Terminology

Here are some terms used throughout the documentation:

_1and1_: [AZBR's web hosting provider](https://www.1and1.com/).

_bootstrap_: The responsive front-end library that the AZBR site relies on. The AZBR site is using v3.3 and documentation can be found [here](http://getbootstrap.com/docs/3.3/).

_live site_: The real deal. The legit site. The version that is served up to visitors of http://www.azbrscca.org. When `ssh`-ing into the web server, this is found in the `live.azbrscca.org` directory.

 _dev site_: A staging area where changes can be previewed while on the same server with the same configuration as the live site. This is located at http://dev.azbrscca.org and in the `dev.azbrscca.org` subdirectory of the web server.

## How Do I ...

***Add a course map?***

Many of the course maps (April 2014 and later, to be exact) are not in GitHub, they reside only on the 1and1 web server. To add a course map, copy it to the web server via `scp` into the `autocross/courses` subdirectory of the live site. Course maps must be in JPEG format with a `.jpg` extension and a file name of the event date formatted as `YYYY-MM-DD`. Example: `2009-01-25.jpg`. Course maps that do not meet this criteria will not show up on the front page or in the course map archive.

***Create a new page?***

Start with a copy of the `template.html` file at the top level of the site. When rendered in a browser, it looks like [this](http://www.azbrscca.org/template.html). From there, content can be added as _rows_ divs; the template contains a bare bones example of this.

Each new page must start with importing `common/Common.php` and call `open_page()` so that the header and menu bar renders properly. Each new page must end with a call to `close_page()` so that the content containers and footer are rendered properly.

***Change the date on a meeting?***

Meetings are auto-populated on the front page, but replacement dates can be specified when conflicts occur. The `Meetings.php` file handles this and contains a [documentation comment](https://github.com/azbrscca/azbrscca.org/blob/master/about/Meetings.php#L4) on how to change a meeting date.

***Toggle the event calendars to a new year?***

At the top of each `calender.html` file - there is one each in the `autocross` and `rallycross` subdirectories, change the `$calendar_year` value to the desired year.

***Change images in the carousels on the front page?***

To update the image carousels, add or remove files from the directory associated with the carousel. The autocross carousel lives in the `autocross/carousel` subdirectory and the rallycross carousel lives in the `rallycross/carousel` subdirectory.

Carousel images must be in JPEG format with a `.jpg` extension. The optimal aspect ratio is 2.85:1 (example size: 710px X 205px).
