<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="80" alt="Laravel Logo">
</p>

<h1 align="center">Laravel Blade CreateForm Component</h1>


# Laravel Rapid Form

[![Latest Version on Packagist](https://img.shields.io/packagist/v/AMIRHOSSEIN-RAHRO/laravel-rapid-form.svg?style=flat-square)](https://packagist.org/packages/AMIRHOSSEIN-RAHRO/laravel-rapid-form)
[![Total Downloads](https://img.shields.io/packagist/dt/AMIRHOSSEIN-RAHRO/laravel-rapid-form.svg?style=flat-square)](https://packagist.org/packages/AMIRHOSSEIN-RAHRO/laravel-rapid-form)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/AMIRHOSSEIN-RAHRO/FormBuilder/check-style.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/AMIRHOSSEIN-RAHRO/FormBuilder/actions?query=workflow%3A"Check+Code+Style")
[![Tests Action Status](https://img.shields.io/github/actions/workflow/status/AMIRHOSSEIN-RAHRO/FormBuilder/run-tests.yml?label=tests&style=flat-square)](https://github.com/AMIRHOSSEIN-RAHRO/FormBuilder/actions?query=workflow%3A"Run+Tests")
[![GitHub Issues](https://img.shields.io/github/issues/AMIRHOSSEIN-RAHRO/FormBuilder.svg?style=flat-square)](https://github.com/AMIRHOSSEIN-RAHRO/FormBuilder/issues)

A highly customizable Blade component for Laravel that lets you create full forms with **one line of code**. Perfect for rapid prototyping, testing, CRUD operations, and admin panels. Supports auto-naming, old() values, validation, and all HTTP methods (including PUT/DELETE spoofing).

## Why Use Laravel Rapid Form?

- **Speed**: `<x-forms.create-form :count-input="5" />` → Instant 5-field form with CSRF and submit button.
- **Flexibility**: Switch between auto-generated fields (for tests) and manual arrays (for production CRUD).
- **Laravel Native**: Built with Blade Components, fully compatible with validation, old(), and method spoofing.
- **Tailwind Ready**: Pre-styled with Tailwind CSS classes (easy to override).
- **Lightweight**: No dependencies beyond Laravel's View component.

This component balances simplicity for beginners with power for pros — avoiding the bloat of heavy form builders.

## Installation

1. Install via Composer:
   ```
   composer require AMIRHOSSEIN-RAHRO/laravel-rapid-form
   ```

2. The package auto-discovers via Laravel's service provider. If not, add to `config/app.php`:
   ```php
   'providers' => [
       // ...
       AMIRHOSSEIN\RapidForm\RapidFormServiceProvider::class,
   ],
   ```

3. Publish views (optional, for customization):
   ```
   php artisan vendor:publish --tag=rapid-form-views
   ```

That's it! Now use `<x-forms.create-form>` in your Blade templates.

## Quick Start

### Basic Auto-Form (3 Fields)
```blade
<x-forms.create-form action="/submit" :count-input="3" />
```
- Renders: 3 auto-named inputs (`Part_1_Input`, etc.), CSRF, and Submit button.
- Ideal for: Quick tests or prototypes.

### Delete Form (No Fields, Just Button)
```blade
<x-forms.create-form 
    action="{{ route('posts.destroy', $post) }}" 
    method="delete" 
    :count-input="0" 
    submit-text="Delete Post"/>
```
- Renders: Hidden method field, CSRF, and Delete button.
- Ideal for: Confirmation forms.

## Full Examples

### 1. Create Report Form (Manual Fields with Validation)
For a news reporting form with phone, subject, level, and message. Uses manual arrays for precise control.

```blade
<x-forms.create-form 
    :subject="'Create Report - Online News'"
     action="{{ route('news.Reports.create') }}"
    :method="'post'"
    :csrf="true"
    :auto-id-start="0"
    :class-model="'space-y-6 m-10'"
    :count-input="4"
    :auto-name-id="false"
    :name-array="['Phone_Number', 'Subject', 'level', 'Message']"
    :id-array="['Phone_Number', 'Subject', 'level', 'Message']"
    :property-title-array="['Phone Number : ', 'Subject : ', 'Level : ', 'Message : ']"
    :property-input-type-array="['tel', 'text', 'range', 'text']"
    :property-input-required-array="[true, false, false, true]"
    :property-input-placeholder-array="['Please Enter The Phone Number : ', 'Please Enter Subject : ', 'Please Select Level : ', 'Enter Your Message : ']"
    :submit-text="'Send Report For News'">

    <p>Thank You ☺️</p>

</x-forms.create-form>
```
- **Key Features**: Custom types (tel, range), required fields, placeholders, old() support, slot for errors/thanks.
- **Use Case**: User submission forms with validation.

### 2. Update Report Form (With Pre-filled Data)
Similar to create, but pre-fills from model and uses PUT method.

```blade
<x-forms.create-form 
    subject="Update Report : {{ $report->Subject }} - Online News"
    action="{{ route('news.Reports.update', ['report' => $report->id]) }}"
    :method="'put'"
    :csrf="true"
    :auto-id-start="0"
    :class-model="'space-y-6 m-10'"
    :count-input="4"
    :auto-name-id="false"
    :name-array="['Phone_Number', 'Subject', 'level', 'Message']"
    :id-array="['Phone_Number', 'Subject', 'level', 'Message']"
    :property-title-array="['Phone Number : ', 'Subject : ', 'Level : ', 'Message : ']"
    :property-input-type-array="['tel', 'text', 'range', 'text']"
    :property-input-required-array="[true, false, false, true]"
    :property-input-placeholder-array="['Please Enter The Phone Number : ', 'Please Enter Subject : ', 'Please Select Level : ', 'Enter Your Message : ']"
    :old-array="[$report->Phone_Number, $report->Subject, $report->level, $report->Message]"
    :submit-text="'Update Report'">
    <p>Thank You ☺️</p>
</x-forms.create-form>
```
- **Key Features**: oldArray pre-fills from $report, PUT method spoofing.
- **Use Case**: Edit forms in admin panels.

### 3. Simple Delete Button Form
Inline delete action without fields.

```blade
    <x-forms.create-form 
        :method="'delete'"
        action="{{ route('news.report.delete', [$last_feed->id]) }}"
        :subject="''"
        :class-model="'m-1'"
        :csrf="true"
        :count-input="0"
        :auto-name-id="true"
        :auto-id-start="0"
        :submit-text="'Delete'"/>
```
- **Key Features**: Zero fields, auto-submit name, empty arrays for clean syntax.
- **Use Case**: Bulk actions or inline deletes.

## Attributes Reference

### 1. **Core Form Attributes (Always Required)**
| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `action` | `string` | `"#"` | Form submission URL (`action` on `<form>`). Essential for routing. |
| `method` | `string` | `"post"` | HTTP method. Supports `put`, `patch`, `delete` via spoofing (`@method()`). Defaults to `post` in HTML. |
| `count-input` | `int` | `0` | Number of auto-generated `<input>` fields. Use `0` for button-only forms. |

### 2. **Mode Control (Decides Auto vs Manual)**
| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `auto-name-id` | `bool` | `true` | Enables auto-naming (`Part_1_Input`). If `true`, ignores all arrays. Set `false` for manual control. |
| `auto-id-start` | `int` | `0` | Starting number for auto-names. Only used if `auto-name-id=true`. Prevents ID conflicts in multi-form pages. |

### 3. **Manual Arrays (Use Only When `auto-name-id=false`)**
| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `name-array` | `array` | `[]` | Input names (`name` attribute). Must match `count-input` length. |
| `id-array` | `array` | `[]` | Input IDs (`id` attribute). Must match `count-input` length. |
| `old-array` | `array` | `[]` | Pre-filled values via `old()`. Integrates with Laravel validation. |
| `property-title-array` | `array` | `[]` | Label texts for each field. Empty = no label. |
| `property-input-type-array` | `array` | `[]` | Input types (e.g., `text`, `email`, `tel`, `range`). Supports all 21 HTML5 types; defaults to `text`. |
| `property-input-required-array` | `array` | `[]` | Boolean array for `required`. Only `true` adds the attribute. |
| `property-input-placeholder-array` | `array` | `[]` | Placeholder texts per field. |

### 4. **Submit Button**
| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `submit-text` | `string` | `"Submit"` | Button label (e.g., "Save", "Delete"). |
| `id-submit` | `string` | `""` | Submit button ID. Auto-generates if empty and `auto-name-id=true`. |
| `name-submit` | `string` | `""` | Submit button name. Auto-generates if empty and `auto-name-id=true`. |

### 5. **Appearance & Security**
| Attribute | Type | Default | Description |
|-----------|------|---------|-------------|
| `subject` | `string` | `"Form"` | Form title (`<h2>`). Empty = no title. |
| `class-model` | `string` | `"space-y-4"` | CSS classes for `<form>` (e.g., Tailwind spacing). |
| `csrf` | `bool` | `true` | Adds `@csrf` token. Set `false` for non-Laravel forms. |

**Notes**:
- **Auto Mode**: Only set `count-input` and `auto-id-start`; arrays are ignored.
- **Manual Mode**: All arrays must exactly match `count-input` count, or errors occur.
- **Slot (`{{ $slot }}`)**: Insert custom content (e.g., `<textarea>`, errors) between fields and button.
- **Input Classes**: Fixed Tailwind: `w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500`.
- **Field Wrappers**: `<div class="Part_X">` (auto) or `id-array[i]` (manual) for styling/JS.

## Usage Tips

- **Multiple Forms per Page**: Use unique `auto-id-start` (e.g., 100, 200) to avoid ID clashes.
- **Livewire Compatibility**: Wrap in `<div wire:ignore>`.
- **Customization**: Override classes by publishing views.
- **Testing**: Use Blade testing: `$this->blade('<x-forms.create-form :count-input="1" />')->assertSee('Part_1_Input');`.

## Contributing

1. Fork the repo.
2. Create a feature branch (`git checkout -b feature/AmazingFeature`).
3. Commit changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to branch (`git push origin feature/AmazingFeature`).
5. Open PR.

See [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover vulnerabilities, report via [GitHub Issues](https://github.com/AMIRHOSSEIN-RAHRO/FormBuilder/issues).

## License

MIT. See [LICENSE.md](LICENSE.md).

## Credits

- Built by [AMIRHOSSEIN RAHRO](https://github.com/AMIRHOSSEIN-RAHRO).
- Inspired by Laravel's Blade Components.

---

**Questions?** Open an issue. Stars appreciated! ⭐

<p align="center">
  <b>Made with ❤️ for Laravel developers</b>
</p>
