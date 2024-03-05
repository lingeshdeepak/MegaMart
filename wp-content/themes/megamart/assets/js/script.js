jQuery(document).ready(function($) {
  // Replace "upper-section" and "menu-section" with your actual section IDs
  jQuery('#upper-section .toggle-icon').click(function() {
    jQuery('#menu-section').slideToggle('fast');
  });
});