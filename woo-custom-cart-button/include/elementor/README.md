# Elementor Widget for WooCommerce Custom Cart Button

This document explains how to use the Elementor widget that integrates with the WooCommerce Custom Cart Button plugin.

## Overview

The plugin provides one main Elementor widget that displays the custom buttons you've configured in your plugin's product settings. The widget automatically uses the styling from your plugin settings page.

## Requirements

- WordPress 5.0 or higher
- Elementor 3.0.0 or higher
- WooCommerce 4.0 or higher
- WooCommerce Custom Cart Button plugin

## Installation

The Elementor widget is automatically included when both Elementor and the WooCommerce Custom Cart Button plugin are active. No additional installation is required.

## Widget Category

The widget is available in the **"Custom Cart Button"** category in the Elementor widgets panel.

## Widget Details

### Product Custom Buttons Widget

**Purpose**: Display the custom buttons that you've configured for a specific product in your plugin settings.

**Features**:
- Displays custom buttons configured in plugin's product settings
- Automatic styling from plugin settings page
- Optional product information display
- Vertical and horizontal layout options
- Responsive design

**How it works**:
1. You configure custom buttons in your plugin's product settings (like "Test1", "Contact Me", etc.)
2. The Elementor widget displays these exact buttons with their configured labels and URLs
3. All styling comes from your plugin settings page, not from Elementor

**Controls**:
- **Show Product Info**: Toggle to show product details
- **Show Product Image**: Display product image
- **Show Product Title**: Display product name
- **Show Product Price**: Display product price
- **Layout Type**: Vertical or horizontal layout
- **Content Alignment**: Left, center, or right alignment

**Usage**:
1. Configure custom buttons for a product in your plugin settings
2. Drag the "Product Custom Buttons" widget to your Elementor page
3. Configure which product information to display
4. Choose layout type
5. The widget will automatically detect the current product and display its custom buttons

**How it works**:
- **Automatic Product Detection**: The widget automatically detects the current product on product pages
- **No Manual Input Required**: No need to enter product IDs manually
- **Works on Product Pages**: Designed to work on single product pages, shop pages, and category pages
- **Full Plugin Integration**: Uses the same variables and styling logic as the main plugin
- **Theme Compatibility**: Includes Avada theme compatibility and other theme-specific styling
- **Smart Button Display**: Shows buttons according to your plugin settings:
  - **Dual Button**: Shows both default add-to-cart and custom buttons
  - **Default WooCommerce Button**: Shows only the default add-to-cart button
  - **Custom ATC Button Per Product**: Shows only custom buttons for the product
- **Position & Alignment**: Respects your plugin's button position and alignment settings

## Styling

**Important**: Button styling is controlled entirely by your plugin settings page, not by Elementor controls.

### Plugin Settings Control:
- Button colors (background, text, border)
- Font size and typography
- Border radius and padding
- Hover effects
- Button alignment
- All other styling options

### To customize button styling:
1. Go to **Custom Add to Cart → Button Settings**
2. Configure your desired colors, fonts, borders, etc.
3. Save your settings
4. The Elementor widget will automatically use these styles

## Integration with Plugin Settings

The widget automatically integrates with your plugin settings:

- **Custom Labels**: Displays the exact button labels you've set in product settings
- **Custom URLs**: Uses the exact URLs you've configured for each button
- **Button Styling**: Inherits all styling from your plugin settings page
- **Multiple Buttons**: Shows all custom buttons you've configured for the product
- **Full Variable Integration**: Uses the same variables and logic as the main plugin
- **Theme Compatibility**: Includes Avada theme compatibility and other theme-specific features
- **Open in New Tab**: Respects the "open in new tab" setting from plugin options
- **Button Margins**: Applies the same margin settings as configured in the plugin

## Responsive Design

The widget is fully responsive and includes:

- Mobile-first design approach
- Adaptive layouts for different screen sizes
- Touch-friendly button sizes
- Optimized spacing for mobile devices

## Browser Compatibility

The widget is compatible with:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Internet Explorer 11+

## Troubleshooting

### Widget Not Appearing
1. Ensure Elementor is active and up to date
2. Check that WooCommerce is installed and active
3. Verify the plugin is properly installed
4. Clear any caching plugins

### Buttons Not Displaying
1. Ensure you're on a product page (single product, shop, or category page)
2. Check that the product has custom buttons configured in plugin settings
3. Ensure the product is published and in stock
4. Verify custom button labels and URLs are set

### Styling Issues
1. Check your plugin settings page for button styling
2. Clear browser cache
3. Check for CSS conflicts with your theme
4. Verify plugin settings are saved

## Customization

### Adding Custom CSS
You can add custom CSS to override widget styles:

```css
/* Custom button styling */
.catcbll-product-button {
    background-color: #your-color !important;
}

/* Custom product info styling */
.catcbll-product-title {
    color: #your-color !important;
}
```

### Hooks and Filters
The widget supports various WordPress hooks for customization:

```php
// Modify widget behavior
add_filter('catcbll_elementor_widget_settings', function($settings) {
    // Custom modifications
    return $settings;
});
```

## Support

For support with the Elementor widget:

1. Check this documentation first
2. Review the main plugin documentation
3. Contact plugin support with specific error messages
4. Include your WordPress, Elementor, and plugin versions

## Changelog

### Version 2.0
- Initial release of Elementor widget
- Single widget focused on product custom buttons
- Full integration with plugin settings
- Responsive design
- Automatic styling from plugin settings

## License

The Elementor widget is part of the WooCommerce Custom Cart Button plugin and follows the same license terms. 