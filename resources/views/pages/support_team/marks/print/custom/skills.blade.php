{{-- Affective & Psychomotor Assessment Section --}}
<div class="assessment-container">
    {{-- Affective Domain (AF) --}}
    <div class="assessment-col">
        <div class="rating-legend">
            RATINGS: 1 - Has no degree for observable trait. 2 - Shows minimal record for observable trait. 3 - Maintains acceptable level of observed trait. 4 - Maintains a high degree of observed trait. 5 - Maintains an excellent degree of observed trait.
        </div>
        <h4>AFFECTIVE ASSESSMENT</h4>
        <div style="display: flex; justify-content: flex-end; gap: 12px; font-size: 10px; font-weight: 800; padding-right: 15px; margin-bottom: 5px;">
            <span>1</span> <span>2</span> <span>3</span> <span>4</span> <span>5</span>
        </div>
        
        @foreach ($skills->where('skill_type', 'AF') as $af)
            @php
                $af_array = $exr->af ? explode(',', $exr->af) : [];
                $rating = isset($af_array[$loop->index]) ? $af_array[$loop->index] : 0;
            @endphp
            <div class="trait-grid-row {{ $loop->even ? 'row-even' : 'row-odd' }}">
                <span class="trait-label">{{ strtoupper($af->name) }}</span>
                <div class="rating-options">
                    @for($i=1; $i<=5; $i++)
                        <div class="circle-rating {{ $rating == $i ? 'selected' : '' }}"></div>
                    @endfor
                </div>
            </div>
        @endforeach
        
        <div style="text-align: right; margin-top: 10px; font-weight: 800; font-size: 12px; color: var(--secondary-blue);">
            Affective Score - 73%
        </div>
    </div>

    {{-- Psychomotor Domain (PS) --}}
    <div class="assessment-col">
        <div style="height: 48px;"></div> {{-- Spacer to align titles --}}
        <h4>PSYCHOMOTOR ASSESSMENT</h4>
        <div style="display: flex; justify-content: flex-end; gap: 12px; font-size: 10px; font-weight: 800; padding-right: 15px; margin-bottom: 5px;">
            <span>1</span> <span>2</span> <span>3</span> <span>4</span> <span>5</span>
        </div>
        
        @foreach ($skills->where('skill_type', 'PS') as $ps)
            @php
                $ps_array = $exr->ps ? explode(',', $exr->ps) : [];
                $rating = isset($ps_array[$loop->index]) ? $ps_array[$loop->index] : 0;
            @endphp
            <div class="trait-grid-row {{ $loop->even ? 'row-even' : 'row-odd' }}">
                <span class="trait-label">{{ strtoupper($ps->name) }}</span>
                <div class="rating-options">
                    @for($i=1; $i<=5; $i++)
                        <div class="circle-rating {{ $rating == $i ? 'selected' : '' }}"></div>
                    @endfor
                </div>
            </div>
        @endforeach
        
        <div style="text-align: right; margin-top: 10px; font-weight: 800; font-size: 12px; color: var(--secondary-blue);">
            Psychomotor Score - 87%
        </div>
    </div>
</div>
