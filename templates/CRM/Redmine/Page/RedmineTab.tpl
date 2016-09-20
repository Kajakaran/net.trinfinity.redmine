<table>
    <thead>
    <tr>
        <th class="ui-state-default">{ts}Subject{/ts}</th>
        <th class="ui-state-default">{ts}Tracker{/ts}</th>
        <th class="ui-state-default">{ts}Status{/ts}</th>
        <th class="ui-state-default">{ts}Priority{/ts}</th>
        <th class="no-sort ui-state-default"></th>
    </tr>
    </thead>
    <tbody>

    {foreach from=$issues item=issue}
    <tr class="{cycle values="odd,even"}">
        <td><a href="{$redmineurl}/issues/{$issue->id}" target="redmine">{$issue->subject}</a></td>
        <td>{$issue->tracker->name}</td>
        <td>{$issue->status->name}</td>
        <td>{$issue->priority->name}</td>
    </tr>
    {/foreach}
    </tbody>
</table>