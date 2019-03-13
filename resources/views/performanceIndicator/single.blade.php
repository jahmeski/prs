<tr class="text-center">
    <th scope="row">{{ $performanceIndicator->name }}</th>
        {{-- TARGETS --}}
        <td>
            {{ $performanceIndicator->target ? $performanceIndicator->target->first_quarter : 0 }}
        </td>
        <td>
            {{ $performanceIndicator->target ? $performanceIndicator->target->second_quarter : 0 }}
        </td>
        <td>
            {{ $performanceIndicator->target ? $performanceIndicator->target->third_quarter : 0 }}
        </td>
        <td>
            {{ $performanceIndicator->target ? $performanceIndicator->target->fourth_quarter : 0 }}
        </td>
        <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->total : 0 }}</td>

        <td>
            <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}"
                class="h6 show-target-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Targets">
                <span class="badge badge-success">
                    {{ $performanceIndicator->target ? 'Edit' : 'Add' }}
                </span>
            </a>
        </td>

        {{-- ACCOMPLISHMENTS --}}
        <td>
            <a href="{{ $performanceIndicator->accomplishment != null ? route('accomplishments.edit', $performanceIndicator->accomplishment->id) : route('accomplishments.create') }}"
                class="h6 show-accomplishment-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
            {{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->first_quarter : 0 }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->accomplishment != null ? route('accomplishments.edit', $performanceIndicator->accomplishment->id) : route('accomplishments.create') }}"
                class="h6 show-accomplishment-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
            {{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->second_quarter : 0 }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->accomplishment != null ? route('accomplishments.edit', $performanceIndicator->accomplishment->id) : route('accomplishments.create') }}"
                class="h6 show-accomplishment-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
            {{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->third_quarter : 0 }}
            </a>
        </td>
        <td>
            <a href="{{ $performanceIndicator->accomplishment != null ? route('accomplishments.edit', $performanceIndicator->accomplishment->id) : route('accomplishments.create') }}"
                class="h6 show-accomplishment-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
            {{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->fourth_quarter : 0 }}
            </a>
        </td>
        <td accomplishment-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->accomplishment ? $performanceIndicator->accomplishment->total : 0 }}</td>
        <td>
            <a href="{{ $performanceIndicator->accomplishment ? route('accomplishments.edit', $performanceIndicator->accomplishment->id) : route('accomplishments.create') }}"
                class="h6 show-accomplishment-modal" data-id="{{ $performanceIndicator->id }}" title="{{ $performanceIndicator->name }} Accomplishments">
                <span class="badge badge-success">
                {{ $performanceIndicator->accomplishment ? 'Edit' : 'Add' }}
                </span>
            </a>
        </td>

        {{-- REMARKS --}}
        <td>Shut up!</td>
    {!! Form::close() !!}
</tr>
