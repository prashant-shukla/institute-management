<x-filament-widgets::widget>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

             {{-- Today --}}
             <div style="background-color:#2563eb; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="font-size:22px; font-weight:bold;">Today collection</h3>
                <p style="font-size:28px; margin-top:8px;">₹{{ number_format($todayTotal) }}</p>
            </div>
    
            {{-- Weekly --}}
            {{-- <div style="background-color:#d43f8d; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="font-size:22px; font-weight:bold;">Weekly Revenue</h3>
                <p style="font-size:28px; margin-top:8px;">₹{{ number_format($weeklyTotal) }}</p>
            </div> --}}
    
            {{-- Monthly --}}
            <div style="background-color:#d43f8d; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="font-size:22px; font-weight:bold;">Monthly Revenue</h3>
                <p style="font-size:28px; margin-top:8px;">₹{{ number_format($monthlyTotal) }}</p>
            </div>
    
            {{-- Yearly --}}
            <div style="background-color:#09ad95; color:#ffffff; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="font-size:22px; font-weight:bold;">Yearly Revenue</h3>
                <p style="font-size:28px; margin-top:8px;">₹{{ number_format($yearlyTotal) }}</p>
            </div>

    </div>
</x-filament-widgets::widget>
