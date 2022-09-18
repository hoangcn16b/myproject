@php
use App\Helpers\Template as Template;
use App\Helpers\Hightlight as Hightlight;
use App\Models\CategoryModel;
// dd($items);
@endphp
<div class="x_content">
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                    <th class="column-title">#</th>
                    <th class="column-title">Name</th>
                    <th class="column-title">Ordering</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Hành động</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($items))
                    @if (count($items) > 0)
                        @foreach ($items as $key => $val)
                            @php
                                $id = $val['id'];
                                
                                $index = $key + 1;
                                $class = $index % 2 == 0 ? 'even' : 'odd';
                                // $name = Hightlight::show($val['name'], $params['search'] ?? '', 'name');
                                $name = str_repeat('-----/ ', $val['depth'] - 1) . $val['name'];
                                // $status          = Template::showItemStatus($controllerName, $id, $val['status']);
                                // $isHome          = Template::showItemIsHome($controllerName, $id, $val['is_home']);
                                // $display         = Template::showItemSelect($controllerName, $id, $val['display'], 'display');
                                $listBtnAction = Template::showButtonAction($controllerName, $id);
                                $fieldName = 'display';
                                $thisColumn = 'display';
                            @endphp

                            <tr class="{{ $class }} pointer">
                                <td>{{ $index }}</td>
                                <td width="25%">{!! $name !!}</td>
                                <td width="10%">
                                    @if (!empty($val->getPrevSibling()))
                                        <a
                                            href="{{ route('admin/category/ordering', ['ordering' => 'up', 'id' => $id]) }}"><i
                                                class="fa fa-arrow-up"></i></a>
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (!empty($val->getNextSibling()))
                                        <a
                                            href="{{ route('admin/category/ordering', ['ordering' => 'down', 'id' => $id]) }}"><i
                                                class="fa fa-arrow-down"></i></a>
                                    @endif
                                </td>
                                {{-- <td>{!! $status !!}</td> --}}
                                {{-- <td>{!! $isHome  !!}</td> --}}
                                <td>
                                    <livewire:admin.status :rowStatus="$val['status']" :rowId="$id" :inTable="$inTable" />
                                </td>
                                
                                {{-- <td>
                                    <livewire:select :thisColumn="$thisColumn" :thisType="$val['display']" :rowId="$id"
                                        :fieldName="$fieldName" :inTable="$inTable" />
                                </td>
                                <td>{!! $display !!}</td> --}}
                                <td class="last">{!! $listBtnAction !!}</td>
                            </tr>
                        @endforeach
                    @else
                        @include('admin.templates.list_empty', ['colspan' => 12])
                    @endif
                @endif

            </tbody>
        </table>
    </div>
</div>
