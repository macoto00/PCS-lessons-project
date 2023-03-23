const GROUPS_TABLE_NAME = "groups";

var groupRepository = new GroupRepository();

function addNewGroup(object)
{
    var formdata = new FormData();
    const DEFAULT_GROUP_NAME = "New todo list";
    formdata.append("Name", DEFAULT_GROUP_NAME);
    formdata.append("CreatedOn", prepareDateForDatabase(new Date()));
    formdata.append("UpdatedOn", null);
    formdata.append("UserId", document.body.getAttribute("data-userid"));

    // Creating a database record
    var insertedGroupId = groupRepository.create(formdata);

    // Creating a new group element
    var newGroup = createGroupDomElement(insertedGroupId);
    var firstGroup = object.parentNode.getElementsByClassName("form-container")[0];
    object.parentNode.getElementsByClassName("groups-container")[0].insertBefore(newGroup, firstGroup);
}

function updateGroup(object)
{
    var groupElem = object.parentNode;
    var formdata = new FormData();
    formdata.append("Id", groupElem.getAttribute("data-groupId"));
    formdata.append("UpdatedOn", prepareDateForDatabase(new Date()));
    formdata.append("Name", object.innerText);

    // Updating a database record
    groupRepository.update(formdata);

    // updating date label
    var listContents = groupElem.getElementsByClassName("list-content");
    var statusElem = listContents[listContents.length - 1];
    statusElem.innerText = `Updated: ${prepareDateForDisplaying(new Date())}`;
}

function deleteGroup(object)
{
    var formdata = new FormData();
    formdata.append("Id", object.getAttribute("data-groupId"));

    // Deleting a database record
    groupRepository.delete(formdata);
    
    // Deleting group element
    object.remove();
}

function createGroupDomElement(insertedGroupId)
{
    var newGroup = document.createElement("div");
    newGroup.className = "form-container";
    newGroup.setAttribute("data-open", 1);
    newGroup.setAttribute("data-groupId", insertedGroupId);
    newGroup.innerHTML = 
        `<div class="list-header" contenteditable onblur="updateGroup(this)">
            New todo list
        </div>
        <div class="list-content">
            <div class="items-count">
                Items count: 0
            </div>
            <div class="items-list">
                <div class="list-item" onclick="addNewItem(this)">
                    <input type="checkbox" class="add-item" disabled>
                    <div class="list-item-content">Add item</div>
                </div>
            </div>
        </div>
        <div class="list-content" data-type="date">
            Created: ${prepareDateForDisplaying(new Date)}
        </div>
        <div class="list-controls">
            <div class="list-control">
                <div class="list-control-icon" data-type="expand" onclick="expandClick(this.parentNode.parentNode.parentNode)"></div>
            </div>
            <div class="list-control">
                <div class="list-control-icon" data-type="delete" title="Delete" onclick="deleteGroup(this.parentNode.parentNode.parentNode)"></div>
            </div>
        </div>`;
    return newGroup;
}