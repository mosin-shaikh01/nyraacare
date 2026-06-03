# Template Parts Documentation

This theme uses a modular template-parts system that allows you to easily add and customize sections on your pages.

## Available Template Parts

### Hero Section (`template-parts/section-hero.php`)
The hero section is displayed on the home page and includes:
- Heading text
- Subheading/description
- Call-to-action button
- Background image (optional)

**Customization via WordPress Customizer:**
1. Go to Appearance → Customize
2. Click on "Hero Section"
3. Update:
   - Hero Heading
   - Hero Subheading
   - Button Text
   - Button URL
   - Hero Image

### Content Section (`template-parts/section-content.php`)
A flexible section for displaying content with a heading.

**Usage in Code:**
```php
get_template_part( 'template-parts/section', 'content', array(
    'heading' => 'Section Heading',
    'content' => 'Your content here',
    'class'   => 'custom-class'
) );
```

### Services Section (`template-parts/section-services.php`)
Displays services in a responsive grid layout.

**Usage in Code:**
```php
$services = array(
    array(
        'icon'        => '🏥',
        'title'       => 'Service Title',
        'description' => 'Service description text'
    ),
    array(
        'icon'        => '👨‍⚕️',
        'title'       => 'Another Service',
        'description' => 'Another service description'
    )
);

get_template_part( 'template-parts/section', 'services', array(
    'heading'  => 'Our Services',
    'services' => $services
) );
```

### Contact Info Section (`template-parts/section-contact-info.php`)
Displays 3 cards with address, phone number, and email address.

**Customization via WordPress Customizer:**
1. Go to Appearance → Customize
2. Click on "Contact Information"
3. Update:
   - Section Heading
   - Address
   - Phone Number
   - Email Address

**Usage in Code:**
```php
get_template_part( 'template-parts/section', 'contact-info', array(
    'heading' => 'Get In Touch',
    'cards'   => array(
        array(
            'icon'      => '📍',
            'title'     => 'Address',
            'content'   => '123 Main Street, City, State 12345',
        ),
        array(
            'icon'      => '📞',
            'title'     => 'Phone',
            'content'   => '+1 (555) 123-4567',
            'link_type' => 'tel',
        ),
        array(
            'icon'      => '✉️',
            'title'     => 'Email',
            'content'   => 'info@example.com',
            'link_type' => 'email',
        )
    )
) );
```

**Features:**
- Phone numbers are clickable with `tel:` links
- Email addresses are clickable with `mailto:` links
- Responsive 3-column grid (adapts to mobile)
- Hover effects with smooth transitions

### Contact Form Section (`template-parts/section-contact-form.php`)
Displays a contact form using shortcodes from popular form plugins (Contact Form 7, WPForms, Gravity Forms, etc.).

**Customization via WordPress Customizer:**
1. Go to Appearance → Customize
2. Click on "Contact Form"
3. Configure:
   - Section Heading
   - Section Description
   - Form Shortcode (from your form plugin)

**Supported Form Plugins:**
- [Contact Form 7](https://wordpress.org/plugins/contact-form-7/)
- [WPForms](https://wpforms.com/)
- [Gravity Forms](https://www.gravityforms.com/)
- [Formidable Forms](https://formidableforms.com/)
- [Ninja Forms](https://ninjaforms.com/)
- Any plugin that uses shortcodes

**How to Get a Shortcode:**

**Contact Form 7:**
1. Install and activate Contact Form 7 plugin
2. Go to Contact → Contact Forms
3. Create a new form
4. Copy the shortcode (e.g., `[contact-form-7 id="123" title="Contact form 1"]`)
5. Paste in Customizer → Contact Form → Form Shortcode

**WPForms:**
1. Install and activate WPForms plugin
2. Create a new form
3. Use the shortcode provided (e.g., `[wpforms id="123"]`)
4. Paste in Customizer → Contact Form → Form Shortcode

**Usage in Code:**
```php
get_template_part( 'template-parts/section', 'contact-form', array(
    'heading'     => 'Get In Touch',
    'description' => 'We\'d love to hear from you.',
    'shortcode'   => '[contact-form-7 id="123"]'
) );
```

**Features:**
- Accepts any form plugin shortcode
- Responsive form styling
- Professional styling with primary color accents
- Placeholder message when no shortcode is added
- Full-width container with padding
- Automatic form styling applied

## How to Add Sections to Home Page

### Option 1: Using `home.php` Hook
The `home.php` file includes a hook `nyarracare_home_sections` where you can add custom sections:

```php
add_action( 'nyarracare_home_sections', function() {
    get_template_part( 'template-parts/section', 'services', array(
        'heading'  => 'Our Services',
        'services' => array(
            array(
                'icon'        => '🏥',
                'title'       => 'Emergency Care',
                'description' => 'Available 24/7'
            )
        )
    ) );
} );
```

### Option 2: Direct Modification
Edit `home.php` directly and add `get_template_part()` calls:

```php
get_template_part( 'template-parts/section', 'services' );
get_template_part( 'template-parts/section', 'content' );
```

### Option 3: Using a Plugin
Create a custom plugin that hooks into `nyarracare_home_sections` to add sections dynamically.

## Creating Custom Template Parts

To create a new template part:

1. Create a new file in `template-parts/` named `section-{name}.php`
2. Follow this structure:

```php
<?php
/**
 * {Name} Section Template Part
 *
 * @package Nyarracare
 */

// Get parameters passed from get_template_part()
$param1 = isset( $args['param1'] ) ? $args['param1'] : '';
?>

<section class="custom-section">
    <div class="container">
        <!-- Your content here -->
    </div>
</section>
```

3. Add CSS styling to `style.css` for your new section

4. Use in `home.php`:

```php
get_template_part( 'template-parts/section', '{name}', array(
    'param1' => 'value'
) );
```

## File Structure

```
wp-content/themes/nyarracare-theme/
├── home.php
├── template-parts/
│   ├── section-hero.php
│   ├── section-content.php
│   ├── section-services.php
│   └── section-{custom}.php
└── style.css
```

## Best Practices

1. **Always sanitize output** - Use `wp_kses_post()` for HTML content and `esc_attr()`, `esc_html()` for attributes
2. **Use `isset()` checks** - Always check if variables exist before using them
3. **Provide defaults** - Set sensible default values in `isset()` checks
4. **Keep sections modular** - Each section should be independent and reusable
5. **Add CSS classes** - Use semantic class names for styling and JavaScript hooks

## Example: Complete Custom Section

```php
<?php
/**
 * Testimonials Section Template Part
 *
 * @package Nyarracare
 */

$testimonials = isset( $args['testimonials'] ) ? $args['testimonials'] : array();
$heading = isset( $args['heading'] ) ? $args['heading'] : 'What Our Patients Say';
?>

<section class="testimonials-section">
    <div class="container">
        <h2 class="section-heading"><?php echo wp_kses_post( $heading ); ?></h2>
        
        <div class="testimonials-grid">
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <div class="testimonial-card">
                    <p class="testimonial-text">
                        <?php echo wp_kses_post( $testimonial['text'] ); ?>
                    </p>
                    <p class="testimonial-author">
                        - <?php echo esc_html( $testimonial['author'] ); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
```

Then use it in `home.php`:

```php
get_template_part( 'template-parts/section', 'testimonials', array(
    'testimonials' => array(
        array(
            'text' => 'Great service!',
            'author' => 'John Doe'
        )
    )
) );
```
