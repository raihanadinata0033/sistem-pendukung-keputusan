<div class="card border-0 mb-4 mt-2">
    <div class="card-header font-weight-bold text-primary">
        Rank
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" border="1" id="weight" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Rank.</th>
                        <th>Employe Name</th>

                        @foreach ($criterias_filtered as $criteria)
                            <th>
                                {{ $criteria->criteria_code }}<br>
                                ({{ $criteria->nama }})
                            </th>
                        @endforeach

                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>

                    @if(count($arr) > 10 && count($arr) < 5)
                        <tr>
                            <td colspan="5">Data tidak valid</td>
                        </tr>
                    @endif

                    @foreach ($arrs as $index => $result)

                        @php
                            if($result['type'] = 'benefit'){
                                $result['score'] = $result['score'] - 10;
                            }else{
                                $result['score'] = $result['score'] + 10;
                            }
                        @endphp

                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $result['fullname'] }}</td>
                            @foreach ($result['criterias'] as $key => $criteria)
                                <td>
                                    {{ $criteria['hasil'] }}
                                </td>
                            @endforeach

                            <td>
                                {{ $result['score'] }}
                            </td>
                        </tr>

                        @if($loop->iteration > 10)
                            @break
                        @endif

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
