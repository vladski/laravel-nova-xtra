<div class="relative">
    <div class="flex mb-6 items-center justify-between">
        <h1 class="text-90 font-normal text-2xl">
            Nova Xtra
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
                <td colspan="2" class="bg-30">
                    Powered by <a href="https://atomiks.github.io/tippyjs/" class="text-primary font-bold" target="_blank">Tippy.js</a>. Exposed for further use through <code class="text-info-dark">window.Nxtra.tippy</code>
                </td>
            </tr>
            <tr>
                <td class="font-bold">Text Tooltip</td>
                <td class="text-sm">
                    Display text tooltip on any element by adding attribute<br>
                    <code class="text-info-dark font-bold">data-tippy-content="This is simple tooltip"</code>
                </td>
                <td>hover <b data-tippy-content="This is simple tooltip" class="font-bold">here</b> to see tooltip</td>
            </tr>
            <tr>
                <td class="font-bold">Html Tooltip</td>
                <td class="text-sm">
                    Use HTML in tooltip content<br>
                    <code class="text-info-dark font-bold">data-tippy-content="@{!! htmlspecialchars($html) !!}"</code>
                </td>
                <td>
                    hover <b data-tippy-content="{!! htmlspecialchars($html) !!}" class="font-bold">here</b> to see html tooltip
                </td>
            </tr>

            {{-- NAVIGATION --}}
            <tr>
                <td class="bg-30"><span class="font-bold">Navigation</span></td>
                <td colspan="2" class="bg-30">Navigation item types: group, standard link, route link, internal page link.</td>
            </tr>
            <tr>
                <td class="font-bold">Group</td>
                <td class="py-3" colspan="2">
                    <div class="my-1">Create group heading (h4) in navigation with option to make group items collapsible.</div>
                    <div class="my-2"><code class="text-info-dark font-bold">->addNavigationGroup($label, $icon = '', $canSee = true, $options = [])</code></div>
                    <div class="my-1 text-sm">
                        <b>$label</b> navigation label<br>
                        <b>$icon</b> svg icon<br>
                        <b>$canSee</b> boolean | callable | user ability<br>
                        <b>$options</b> array<br>
                        <ul>
                            <li><b>collapsible</b> boolean - makes following gropup of items collapsible</li>
                            <li><b>collapsed</b> boolean - if collapsed as default</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="font-bold">Link</td>
                <td class="py-3" colspan="2">
                    <div class="my-1">Standard (a) tag link providing href attribute</div>
                    <div class="my-2"><code class="text-info-dark font-bold">->addNavigationLink($label, $href, $canSee = true, $options = [])</code></div>
                    <div class="my-1 text-sm">
                        <b>$label</b> navigation label<br>
                        <b>$href</b> url | "javascript: ....;"<br>
                        <b>$canSee</b> boolean | callable | user ability<br>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="bg-30"><span class="font-bold">Custom Theme</span></td>
                <td colspan="2" class="bg-30">....</td>
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
