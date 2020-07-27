<div class="relative">
    <div class="flex mb-6 items-center justify-between">
        <h1 class="text-90 font-normal text-2xl">
            Nova Xtra Intro Page
            <small>v{{ $version }}</small>
        </h1>
        <button class="btn btn-default btn-primary ml-auto mr-3" onclick="Nxtra.reloadCurrent();">
            Refresh Content
        </button>
    </div>

    <div class="card relative mb-6"><!---->

        <table cellpadding="0" cellspacing="0" class="table w-full">
            <thead>
            <tr>
                <th class="text-left rounded-tl">
                    Feature
                </th>
                <th class="text-left">
                    Description
                </th>
                <th class="text-left rounded-tr">
                    Example
                </th>
            </tr>
            </thead>
            <tbody>
            @php
                $html = '<div><h4 class="font-bold text-base my-1 py-1 px-2 border border-1 border-white">Tooltip Heading</h4><span class="text-success">Success text</span><br><span class="text-danger">Danger text</span></div>';
            @endphp
            <tr>
                <td class="bg-30"><span class="font-bold">Tooltips</span></td>
                <td colspan="2" class="bg-30">Using Tippy.js ....</td>
            </tr>
            <tr>
                <td class="font-bold">Tooltip</td>
                <td class="text-sm">
                    Display tooltip on any element by adding attribute<br>
                    <code class="text-info">data-tippy-content="This is simple tooltip"</code>
                </td>
                <td>hover <b data-tippy-content="This is simple tooltip" class="font-bold">here</b> to see tooltip</td>
            </tr>
            <tr>
                <td class="font-bold">Html Tooltip</td>
                <td class="text-sm">
                    Use HTML in tooltip content<br>
                    <code class="text-info">data-tippy-content="@{!! htmlspecialchars($html) !!}"</code>
                </td>
                <td>
                    hover <b data-tippy-content="{!! htmlspecialchars($html) !!}" class="font-bold">here</b> to see html tooltip
                </td>
            </tr>

            <tr>
                <td class="bg-30"><span class="font-bold">Modal Window</span></td>
                <td colspan="2" class="bg-30">....</td>
            </tr>

            <tr>
                <td class="bg-30"><span class="font-bold">Internal Page</span></td>
                <td colspan="2" class="bg-30">....</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
