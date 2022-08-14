<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Date Raised</th>
      <th>Closure Date</th>
      <th>Unit No</th>
      <th>Unit Type</th>
      <th>Reported By</th>
      <th>Logged By</th>
      <th>Issue Type</th>
      <th width="10%">Issue Detail</th>
      <th>Assigned To</th>
      <th>Assigned Comment</th>
      <th>Date Emailed</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($assign as $item)
    @if($item->status !== "archive" && $item->status !== "closed")
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) ?? 'N/A'}}</td>
      <td>{{ date('d-m-Y H:i:s', strtotime($item->closure_date)) ?? 'N/A'}}</td>
      <td>{{$item->job->unit->unit_no ?? "N/A"}}</td>
      <td>{{$item->job->unit->name ?? "N/A"}}</td>
      <td>
        @if($item->job->reported_by=="staffd")
        Staff
        @elseif($item->job->reported_by=="resident")
        Resient
        @else
        N/A
        @endif
      </td>
      <td>
        {{$item->job->loggedby->name ?? "N/A"}}
      </td>
      <td>{{$item->job->issue->name ?? "N/A"}}</td>
      <td>{{$item->job->description ?? "N/A"}}</td>

      <td>
        @if($item->assign_to == "internal")
        <?php
        $inter = App\Models\InternalMaintainer::find($item->selected_user_id);
        ?>
        {{ $inter->name ?? 'N/A'}}
        @else
        N/A
        @endif
      </td>

      <td width="10%">{{$item->comment ?? "N/A"}}</td>
      <td>{{ date('d-m-Y H:i:s', strtotime($item->date_emailed)) ?? 'N/A'}}</td>
      <td>
        @if($item->status == "open")
        <span >Open</span>
        @elseif($item->status == "hold")
        <span >Hold</span>
        @elseif($item->status== "archive")
        <span >Archived</span>
        @else
        <span >Closed</span>
        @endif
      </td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>