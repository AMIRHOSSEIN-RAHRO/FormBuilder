# 🌿 Laravel Blade FormBuilder Component

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=flat-square&logo=laravel)](https://laravel.com)
[![Stars](https://img.shields.io/github/stars/yourusername/form-builder?style=flat-square)](https://github.com/AMIRHOSSEIN-RAHRO/form-builder/stargazers)
[![License](https://img.shields.io/github/license/AMIRHOSSEIN-RAHRO/form-builder?style=flat-square)](LICENSE)

A **fully dynamic**, **TailwindCSS-based**, and **dependency-free** Laravel Blade component for building flexible, responsive forms with complete slot and array-based configuration support.

---

## 🧩 Component Overview

**Component Path**

| File | Location |
|------|-----------|
| PHP Class | `app/View/Components/Forms/FormBuilder.php` |
| Blade View | `resources/views/components/forms/form-builder.blade.php` |

**Component Tag**

```blade
<x-forms.form-builder />
```

**Namespace**

```php
App\View\Components\Forms
```

---

## 🚀 Features

| Feature | Description |
|----------|--------------|
| 🧱 **Dynamic Inputs** | Define any number of input fields using `:count-input` (supports `0` for slot-only forms). |
| 🪶 **Array-Based Config** | Pass label, type, required, and placeholder arrays for complete customization. |
| 🔢 **Unique Field Names** | Generate unique input names/IDs via `:start-name-number-pk`. |
| 🔒 **CSRF by Default** | Automatically includes `@csrf`, even for `GET` methods. |
| 🧭 **All HTTP Methods** | Supports `GET`, `POST`, `PUT`, and `DELETE` methods. |
| 🧩 **Slot Support** | Insert any custom HTML, Blade, or components between fields and submit button. |
| 🧠 **Safe Rendering** | Uses `??` to prevent “Undefined array key” errors. |
| 📱 **Fully Responsive** | Designed with **TailwindCSS** for clean, mobile-first layouts. |
| 🧘 **Zero Dependencies** | No JS, no config, no extra packages — pure Laravel Blade. |
| 🧾 **Developer-Friendly** | Clean API, consistent naming, and flexible styling with `:class-model`. |

---

## ⚙️ Installation

```bash
# Copy files to your Laravel project
app/View/Components/Forms/FormBuilder.php
resources/views/components/forms/form-builder.blade.php
```

> No Composer package or config file required.  
> Works instantly with Laravel's native Blade component system.

---

## ⚡ Quick Start

```blade
<x-forms.form-builder
    :subject="'Reports-Online News'"
    :action="'/reports'"
    :method="'post'"
    :start-name-number-pk="92467"
    :count-input="4"
    :property-title-array="['Phone Number : ', 'SMS Code : ', 'Email : ', 'Secret key : ']"
    :property-input-type-array="['text', 'number', 'email', 'password']"
    :property-input-required-array="['true', 'true', 'false', 'true']"
    :property-input-placeholder-array="[
        'Please enter the phone number : ',
        'Please enter SMS code : ',
        'Please type email address : ',
        'Enter secret key : '
    ]"
    :submit-text="'Send Report For News'"
    :class-model="'space-y-6 m-10'"
>
    <p>Thank you</p>
</x-forms.form-builder>
```

---

## 🧠 Parameters

| Parameter | Type | Required | Description |
|------------|------|-----------|--------------|
| `:subject` | `string` | ✅ | A short descriptive title or subject for the form. |
| `:action` | `string` | ✅ | The form submission URL or route. |
| `:method` | `string` | ✅ | HTTP method (`get`, `post`, `put`, `delete`). |
| `:start-name-number-pk` | `int` | ✅ | Starting unique number for generating field names & IDs. |
| `:count-input` | `int` | ✅ | Number of input fields (can be `0` for slot-only forms). |
| `:property-title-array` | `array` | ✅ | Labels for each input. |
| `:property-input-type-array` | `array` | ✅ | Input types (`text`, `email`, `password`, `textarea`, etc.). |
| `:property-input-required-array` | `array` | ✅ | Array of `'true'` or `'false'` strings for `required` attribute. |
| `:property-input-placeholder-array` | `array` | ✅ | Custom placeholders for each input. |
| `:submit-text` | `string` | ✅ | Submit button label text. |
| `:class-model` | `string` | ❌ | Tailwind utility classes for form layout & spacing. |
| `<slot>` | `HTML/Blade` | ❌ | Inject custom content between fields and the submit button. |

---

## ⚠️ Important Notes

1. **Uniqueness Responsibility**  
   The `:start-name-number-pk` parameter ensures globally unique input IDs — developers must manage its starting value.

2. **Zero Input Mode**  
   When `:count-input="0"`, the component renders only slot content and submit button.

3. **Validation**  
   No built-in validation or error output — use Laravel’s `@error` directive in your own Blade template.

4. **Required Fields**  
   Only the `required` attribute is applied — no asterisk (`*`) in labels by design.

5. **Styling**  
   The `:class-model` prop provides full control over layout — no fixed form container styles.

---

## 📜 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

**Made with love for Laravel developers ❤️**
