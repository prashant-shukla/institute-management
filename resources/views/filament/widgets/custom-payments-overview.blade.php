<x-filament-widgets::widget>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Green Card --}}
        <div style="background-color:#d1fae5; color:#065f46; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
            <h3 style="font-size:22px; font-weight:bold;">Monthly Fees Collected</h3>
            <p style="font-size:28px; margin-top:8px;">₹{{ number_format($monthlyTotal) }}</p>
        </div>

        {{-- Blue Card --}}
        <div style="background-color:#bfdbfe; color:#1e40af; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1); ">
            <h3 style="font-size:22px; font-weight:bold;">Weekly Fees Collected</h3>
            <p style="font-size:28px; margin-top:8px;">₹{{ number_format($weeklyTotal) }}</p>
        </div>

        {{-- Red Card --}}
        <div style="background-color:#fecaca; color:#991b1b; padding:28px; border-radius:14px; box-shadow:0 4px 12px rgba(0,0,0,0.1); ">
            <h3 style="font-size:22px; font-weight:bold;">Pending Fees</h3>
            <p style="font-size:28px; margin-top:8px;">₹{{ number_format($pendingFee) }}</p>
        </div>

    </div>
</x-filament-widgets::widget>
