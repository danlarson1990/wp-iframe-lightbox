# wp-iframe-lightbox
Easily embed a range of iframes into WordPress via a lightbox

## Installation
Just add lightbox-custom.php to the plugins folder of WordPress, and you're ready to rock and roll.

## Working with the system
### Example Shortcode
[custom_lightbox wrapper-id="lightbox-1" iframe-url="https://codex.wordpress.org/Function_Reference/shortcode_atts"]

### List of attributes
. wrapper-id: user to determine the iframe wrappers id. Only needed if multiple lightboxes are neded on the page
. iframe-url: This is needed to pull in the iframe information and showcase the lightbox. Use complete URLs - http://example.com/iframe.html
. iframe-width: Governs the iframes width attribute
. iframe-height: Governs the iframes height attribute
. image-url: Select the iamge to use as the wrapper open button
. image-width: Governs the image width attribute
. image-height: Governs the image height attribute
