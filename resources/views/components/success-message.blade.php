@if (session('success'))
<div {{ $attributes }}>
    <div class="mt-3 list-disc list-inside text-lg text-green-600">
        <p>{{ session('success') }}</p>
    </div>
</div>
@endif