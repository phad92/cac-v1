<div>
    {{-- Be like water. --}}
    <div class="table-responsive">
                <table class="dbkit-table">
                    <thead>
                        <tr class="heading-td">
                            <th>#</th>
                            <th>ID</th>
                            <th>Event</th>
                            <th>Datetime</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $attendance)
                            <tr>
                                <th>{{ $loop->index+1 }}</th>
                                <th>{{ $attendance->attdshort }}</th>
                                <th>{{ $attendance->name }}</th>
                                <th>{{ $attendance->created_at }}</th>
                                <th>{{ $attendance->active }}</th>
                                <th>
                                    <a href="{{ route('attendance.attendants', $attendance->meta_id) }}" class="btn btn-flat btn-sm btn-default">view</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination_area pull-right mt-5">
                <ul>
                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
</div>
