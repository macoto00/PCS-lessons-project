const ITEMS_TABLE_NAME = "items";

var itemRepository = new ItemRepository();

function addNewItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupId");
    var formdata = new FormData();
    formdata.append("Content", "");
    formdata.append("Done", false);
    formdata.append("CreatedOn", prepareDateForDatabase(new Date()));
    formdata.append("UpdatedOn", null);
    formdata.append("GroupId", groupId);

    // Creating a database record
    var insertedItemId = itemRepository.create(formdata);

    // Creating a new item element
    var newItem = createItemDomElement(insertedItemId);
    object.parentNode.insertBefore(newItem, object);

    // Updating Group status (Created/Updated [date])
    updateGroupElement(object.parentNode);
}

function updateItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupId");
    var checkbox = object.getElementsByTagName("input")[0];
    var caption = object.getElementsByClassName("list-item-content")[0].innerText;
    var itemId = object.getAttribute("data-itemId");
    
    var formdata = new FormData();
    formdata.append("Id", itemId);
    formdata.append("UpdatedOn", prepareDateForDatabase(new Date()));
    formdata.append("Done", checkbox.checked);
    formdata.append("Content", caption);
    formdata.append("GroupId", groupId);

    // Updating a database record
    itemRepository.update(formdata);

    // Updating Group status (Created/Updated [date])
    updateGroupElement(object.parentNode);
}

function deleteItem(object)
{
    var groupId = object.parentNode.parentNode.parentNode.getAttribute("data-groupId");
    var formdata = new FormData();
    formdata.append("Id", object.getAttribute("data-itemId"));
    formdata.append("Date", prepareDateForDatabase(new Date()));
    formdata.append("GroupId", groupId);
    
    // Deleting a database record
    itemRepository.delete(formdata);

    var parent = object.parentNode;

    // Deleting item element
    object.remove();    

    // Updating Group status (Created/Updated [date])
    updateGroupElement(parent);
}

function createItemDomElement(insertedItemId)
{
    var newItem = document.createElement("div");
    newItem.setAttribute("data-itemId", insertedItemId);
    newItem.className = "list-item";
    newItem.innerHTML = 
        `<input 
            type="checkbox"
            onclick="updateItem(this.parentNode)"
            onblur="updateItem(this.parentNode)">
        <div contenteditable class="list-item-content"  onblur="updateItem(this.parentNode)"></div>
        <div class="list-item-control" title="Delete" onclick="deleteItem(this.parentNode)"></div>`;
    return newItem;
}

function updateGroupElement(object)
{
    // updating date label
    var listContents = object.parentNode.parentNode.getElementsByClassName("list-content");
    var statusElem = listContents[listContents.length - 1];
    statusElem.innerText = `Updated: ${prepareDateForDisplaying(new Date())}`;

    // updating items count label
    var itemsCount = object.getElementsByClassName("list-item").length - 1;
    var itemsCountElement = object.parentNode.getElementsByClassName("items-count")[0];
    itemsCountElement.innerText = `Items count: ${itemsCount}`;
}