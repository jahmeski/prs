<tr class="text-center">
    <th scope="row">{{ $performanceIndicator->name }}</th>
        {{-- TARGETS --}}
        <td>
            <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Targets">
            {{ $performanceIndicator->target ? $performanceIndicator->target->first_quarter : 'Add Target' }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Targets">
            {{ $performanceIndicator->target ? $performanceIndicator->target->second_quarter : 'Add Target' }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Targets">
            {{ $performanceIndicator->target ? $performanceIndicator->target->third_quarter : 'Add Target' }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Targets">
            {{ $performanceIndicator->target ? $performanceIndicator->target->fourth_quarter : 'Add Target' }}
            </a>
        </td>
        <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->total : 0 }}</td>

        {{-- ACCOMPLISHMENTS --}}
        <td>
            <a href="{{ $performanceIndicator->accomplishment ? route('accomplishments.edit', $performanceIndicator->target->id) : route('accomplishments.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
            {{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->first_quarter : 0 }}
            </a>
        </td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>Shut up!</td>
    {!! Form::close() !!}
</tr>
