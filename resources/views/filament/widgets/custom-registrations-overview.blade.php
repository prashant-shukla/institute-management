<x-filament-widgets::widget>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        {{-- 🔹 Today Registrations Card --}}
        <div style="background-color:#2563eb; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 5px rgba(0,0,0,0.1);">
            <h3 style="font-size:22px; font-weight:bold;">Today Registrations</h3>
            <p style="font-size:28px; margin-top:8px;">
                {{ number_format($todayRegistrations) }}
            </p>
        </div>

        {{-- 🔹 Monthly Registrations Card --}}
        <div style="background-color:#09ad95; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <h3 style="font-size:22px; font-weight:bold;">Monthly Registrations</h3>
            <p style="font-size:28px; margin-top:8px;">
                {{ number_format($monthlyRegistrations) }}
            </p>
        </div>

        {{-- 🔹 Yearly Registrations Card --}}
        <div style="background-color:#9333ea; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 5px rgba(0,0,0,0.1);">
            <h3 style="font-size:22px; font-weight:bold;">Yearly Registrations</h3>
            <p style="font-size:28px; margin-top:8px;">
                {{ number_format($yearlyRegistrations) }}
            </p>
        </div>

    </div>
</x-filament-widgets::widget>
