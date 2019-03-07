<tr class="text-center">
    <th scope="row">{{ $performanceIndicator->name }}</th>
            <td>
                <a href="{{ $performanceIndicator->target ? route('targets.edit', $performanceIndicator->target->id) : route('targets.create') }}" class="btn btn-success show-target-modal" title="{{ $performanceIndicator->name }}">
                {{ $performanceIndicator->target ? $performanceIndicator->target->first_quarter : '' }}
                </a>
            </td>        
            <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->second_quarter : '' }}</td>
            <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->third_quarter : '' }}</td>
            <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->fourth_quarter : '' }}</td>
            <td target-id="{{ $performanceIndicator->id }}">{{ $performanceIndicator->target ? $performanceIndicator->target->total : '' }}</td>

        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>Shut up!</td>
    {!! Form::close() !!}
</tr>