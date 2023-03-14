const ITEMS_TABLE_NAME = "items";

var itemRepository = new ItemRepository();
 
function addNewItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupid");
    var formdata = new FormData();
    formdata.append("Content", "");
    formdata.append("Done", false);
    formdata.append("CreatedOn", prepareDateForDatabase(new Date()));
    formdata.append("UpdatedPn", null);
    formdata.append("Group", groupId);

    var insertedItemId = itemRepository.create(formdata);

    var newItem = createGroupDomElement(insertedItemId);
    object.parentNode.insertBefore(newItem, object);

    updateGroupElement(object.parentNode);
}

function updateItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupid");
    var checkbox = object.getElementsByTagName("input")[0];
    var caption = object.getElementsByCLassName("list-item-content")[0].innerText;
    var itemid = object.getAttribute("data-itemid");

    var formdata = new FormData();
    formdata.append("Id", itemid);
    formdata.append("UpdatedOn", prepareDateForDatabase(new Date()));
    formdata.append("Done", checkbox.checked);
    formdata.append("Content", caption);
    formdata.append("GroupId", groupId);

    itemRepository.update(formdata);

    updateGroupElement(object.parentNode);
}

function deleteItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupid");
    var formdata = new FormData();
    formdata.append("Id", object.getAttribute("data-itemid"));
    formdata.append("Date", prepareDateForDatabase(new Date()));
    formdata.append("GroupId", GroupId);

    itemRepository.delete(formdata);

    object.remove();

    updateGroupElement(object.parentNode);
}

function updateGroupElement(object)
{
    var listContent = object.parentNode.parentNode.getElementsByCLassName("list-content");
    var statusElem = listContent[listContent.length - 1];
    statusElem.innerText = `Updated: ${prepareDateForDatabase(new Date())}`;

    var itemsCount = object.getElementsByCLassName("list-item").length - 1;
    var itemsCountElement = object.parentNode.getElementsByCLassName("items-count")[0];
    itemsCountElement.innerText = `Items count: ${itemsCount}`;
}

function createGroupDomElement(insertedItemId)
{
    var newItem = document.createElement("div");
    newItem.setAttribute("data-itemid", insertedItemId);
    newItem.className = "list-item";
    newItem.innerHTML = `<input 
                        type="checkbox"
                        onclick="updateItem(this.parentNode)"
                        onblur="updateItem(this.parentNode)">
                     <div contenteditable class="list-item-content"  onblur="updateItem(this.parentNode)"></div>
                     <div class="list-item-control" title="Delete" onclick="deleteItem(this.parentNode)"></div>`;
return newItem;
}
