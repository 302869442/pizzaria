const addFormToCollection = (e) => {
  const collectionHolder = document.querySelector('.' + e.target.dataset.collectionHolderClass);
  console.log(e.target.dataset.collectionHolderClass);
  
  const item = document.createElement('li');

  item.innerHTML = collectionHolder
    .dataset
    .prototype
    .replace(
      /__name__/g,
      collectionHolder.dataset.index
    );

  collectionHolder.appendChild(item);

  collectionHolder.dataset.index++;
};
document
  .querySelectorAll('.add_item_link')
  .forEach(btn => {
      btn.addEventListener("click", addFormToCollection)
  });


// const forms = document.querySelectorAll('form');
// forms.forEach(form => {
//   form.addEventListener('submit', (e) => {
//     e.preventDefault()
//   })
// })