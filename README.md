<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="80" alt="Laravel Logo">
</p>

<h1 align="center">Laravel Blade CreateForm Component</h1>

<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://img.shields.io/badge/Laravel-10.x-red?style=flat-square&logo=laravel"></a>
  <a href="https://github.com/AMIRHOSSEIN-RAHRO/FormBuilder/stargazers"><img src="https://img.shields.io/github/stars/AMIRHOSSEIN-RAHRO/FormBuilder?style=flat-square"></a>
  <a href="LICENSE"><img src="https://img.shields.io/github/license/AMIRHOSSEIN-RAHRO/FormBuilder?style=flat-square"></a>
</p>

---

## 🧩 Overview

**CreateForm** is a dynamic, responsive, and highly flexible **Laravel Blade component** for building any kind of form — from reports and contact forms to registration and feedback forms.  
It’s built with **TailwindCSS**, requires **no dependencies**, and supports **complete slot customization**.

---

## 📂 Component Structure

| File | Location |
|------|-----------|
| PHP Class | `app/View/Components/Forms/CreateForm.php` |
| Blade View | `resources/views/components/forms/create-form.blade.php` |

**Component Tag:**

```blade
<x-forms.create-form />
```

**Namespace:**

```php
App\View\Components\Forms
```

---

## 🚀 Features

| Feature | Description |
|----------|--------------|
| 🔢 **Dynamic Inputs** | Add any number of inputs using `:count-input` (supports `0` for slot-only forms). |
| 🧱 **Universal Purpose** | Build any form type: reports, contact, login, feedback, etc. |
| 🧩 **Full Slot Support** | Inject custom Blade/HTML content between fields and submit button. |
| 🔐 **CSRF Always Included** | CSRF token is always rendered for security — even with GET methods. |
| 🧭 **Flexible Methods** | Accepts `get`, `post`, `put`, `delete`, or any custom HTTP method. |
| 🔠 **Unique IDs & Names** | Controlled by `:start-name-number-pk`, ensuring unique input IDs. |
| 💅 **TailwindCSS Layout** | Fully responsive and designed with Tailwind utility classes. |
| 🧰 **Safe Array Access** | Uses `??` to prevent “Undefined array key” errors. |
| 🧘 **Developer Freedom** | No enforced defaults — you decide the layout, style, and logic. |
| 🧾 **Simple Integration** | Plug-and-play inside any Blade view. |

---

## ⚙️ Installation

```bash
# Copy to your Laravel project
app/View/Components/Forms/CreateForm.php
resources/views/components/forms/create-form.blade.php
```

No composer, no config — it’s pure Laravel Blade.

---

## ⚡ Quick Start Example

```blade
<x-forms.create-form
    :subject="'Reports-Online News'"
    :action="'/reports'"
    :method="'post'"
    :start-name-number-pk="92467"
    :class-model="'space-y-6 m-10'"
    :count-input="4"
    :property-title-array="['Phone Number : ', 'SMS Code : ', 'email : ', 'Secret key : ']"
    :property-input-type-array="['text', 'number', 'email', 'password']"
    :property-input-required-array="['true', 'true', 'false', 'true']"
    :property-input-placeholder-array="[
        'Please Enter The Phone Number : ',
        'Please Enter SMS Code : ',
        'Please Type Email Address : ',
        'Enter Secret Key : ',
    ]"
    :submit-text="'Send Report For News'">

    <p>Thank You ☺️</p>

</x-forms.create-form>
```

---

## 🧱 Example 2 — Contact Form

```blade
<x-forms.create-form
    :subject="'Contact Us'"
    :action="'/contact'"
    :method="'post'"
    :start-name-number-pk="1001"
    :count-input="3"
    :property-title-array="['Name', 'Email', 'Message']"
    :property-input-type-array="['text', 'email', 'textarea']"
    :property-input-required-array="['true', 'true', 'false']"
    :property-input-placeholder-array="['Your name', 'your@email.com', 'Write your message...']"
    :submit-text="'Send Message'">

    <p class="text-sm text-gray-600 mt-4">We will reply within 24 hours.</p>
</x-forms.create-form>
```

---

## 🧠 Parameters

| Parameter | Type | Required | Description |
|------------|------|-----------|--------------|
| `:subject` | `string` | ✅ | Form title or subject. |
| `:action` | `string` | ✅ | The URL or route where form data is sent. |
| `:method` | `string` | ✅ | Any HTTP method (`get`, `post`, `put`, `delete`, etc.). |
| `:start-name-number-pk` | `int` | ✅ | A unique integer seed for generating input IDs/names. |
| `:count-input` | `int` | ✅ | Number of input fields to render (can be `0`). |
| `:property-title-array` | `array` | ✅ | Labels for each input field. |
| `:property-input-type-array` | `array` | ✅ | Input types (`text`, `email`, `password`, `textarea`, etc.). |
| `:property-input-required-array` | `array` | ✅ | `'true'` or `'false'` string for required attributes. |
| `:property-input-placeholder-array` | `array` | ✅ | Custom placeholder text for each input. |
| `:submit-text` | `string` | ✅ | Text for the submit button. |
| `:class-model` | `string` | ❌ | Tailwind classes for the form container. |
| `<slot>` | `HTML/Blade` | ❌ | Inject any custom content or components. |

---

## ⚠️ Design Decisions

1. **start-name-number-pk**: Chosen by the developer to ensure uniqueness across forms.  
2. **CSRF Always Present**: Security-first design; even GET forms include the token.  
3. **Zero Inputs Mode**: Allows completely custom slot-only forms.  
4. **No Default Values**: Simplifies base use; developers can add via JS if needed.  
5. **No Validation Messages**: Intentional — add `@error` blocks manually.  
6. **No Config File**: Keep it lightweight and easy to integrate.  
7. **Tailwind-Only**: Fully responsive and clean layout by default.  

---

## 💡 Customization

- Customize **layout** using `:class-model` (e.g., spacing, padding, grid).  
- Add **custom fields** or **help text** via slots.  
- Extend **form styles** via Tailwind or your CSS framework.  
- Modify the Blade view directly for deeper control.  

---

## 🔐 Security Notes

- Always includes `@csrf` by default.  
- Developer-controlled `method` allows secure PUT/DELETE forms.  
- Unique IDs prevent DOM conflicts in multi-form pages.  
- Safe array handling (`??`) avoids undefined errors.  

---

## 🧩 Example Logic (Blade Snippet)

```blade
@for ($i = 0; $i < $countInput; $i++)
    @php $startNameNumber_PK++; @endphp
    <label>{{ $propertyTitleArray[$i] ?? '' }}</label>
    <input
        type="{{ $propertyInputTypeArray[$i] ?? 'text' }}"
        name="Part_{{ $startNameNumber_PK }}_Input"
        id="Part_{{ $startNameNumber_PK }}_Input"
        placeholder="{{ $propertyInputPlaceholderArray[$i] ?? '' }}"
        {{ ($propertyInputRequiredArray[$i] ?? 'false') === 'true' ? 'required' : '' }}
        class="w-full border rounded-lg p-3"
    />
@endfor

<!-- Slot for custom content -->
{{ $slot }}

<!-- Submit button -->
<button type="submit"
        id="Part_{{ $startNameNumber_PK }}_Submit"
        name="Part_{{ $startNameNumber_PK }}_Submit"
        class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
    {{ $submitText }}
</button>
```

---

## 🧪 Testing & Maintenance

- No unit tests by design (developer freedom).  
- Compatible with Laravel 9.x–10.x.  
- No external dependencies.  

---

## 🪶 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

<p align="center">
  <b>Made with ❤️ for Laravel developers</b>
</p>
