<table>
    <thead>
    <tr>
        <th class="ui-state-default">{ts}Subject{/ts}</th>
        <th class="ui-state-default">{ts}Contacts{/ts}</th>
        <th class="ui-state-default">{ts}Date modified{/ts}</th>
        <th class="ui-state-default">{ts}Modified by{/ts}</th>
        <th class="no-sort ui-state-default"></th>
    </tr>
    </thead>
    <tbody>

    {foreach from=$issues item=issue}
    <tr class="{cycle values="odd,even"}">
        <td>{$doc->subject}</td>
    </tr>
    {/foreach}
    </tbody>
</table>