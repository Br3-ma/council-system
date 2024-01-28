<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center rounded bg-primary py-2 px-6 font-medium text-gray hover:bg-opacity-90']) }}>
    {{ $slot }}
</button>
