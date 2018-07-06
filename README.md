## Bauble
Experimental custom MediaWiki skin that probably should not be used by others. The skin is based on the [Example](https://www.mediawiki.org/wiki/Skin:Example) skin provided as a base to start building a custom skin, with some various adjustments that may break something. This is very much a work-in-progress and definitely never ready for any serious use, especially not now that I have it use Tidy to sanitise the HTML output that may or may not be something that would be easy to scale up. Also, any custom/edited CSS may not work on browsers that are not up-to-date, because that is not a problem for me personally but it might be a problem in production use. So please *do not use this in any serious capacity*. Thank you!

### Requirements
The skin is being edited and tested on PHP 7.2 and has not been tested on anything else, because this skin is a sort of experimental hobby test thingy and I only need that version myself. Other requirements:
* MediaWiki 1.30+
* PHP Tidy
