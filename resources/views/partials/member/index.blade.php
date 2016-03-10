<div class="container" ng-controller="listMemberCtrl">
    [[ inListMemberCtrl ]]
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Age</th>
            <th>Photo</th>
            <th>
                <a href="#/add" class="btn btn-primary">Add member</a>
            </th>
        </thead>
        <tbody>
            <tr ng-repeat="mem in members">
                <td>[[mem.id]]</td>
                <td>[[mem.name]]</td>
                <td>[[mem.address]]</td>
                <td>[[mem.age]]</td>
                <td class="thumbnail"><img src="/up/[[mem.photo]]"></td>
                <td>
                    <button type="button" class="btn btn-primary" ng-click="onEdit(mem)">Edit</button>
                    <button type="button" class="btn btn-primary" ng-click="onDelete(mem.id)">Delete</button>
                    <a href="#/edit/[[mem.id]]" type="button" class="btn btn-warning">Edit now</a>
                </td>
            </row>
        </tbody>
    </table>
</div>
