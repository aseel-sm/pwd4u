const { file } = require("./taluk.js");

// const arr = file[]

// console.log(file);

// console.log(file["file"]["fields"]);

let taluk = file.data.map((item) => {
  return {
    district: item[2],
    vilage: item[4],
  };
});
taluk = taluk.filter(
  (value, index, self) =>
    index ===
    self.findIndex(
      (t) => t.district === value.district && t.vilage === value.vilage
    )
);
let head, rest;
[head, ...rest] = taluk;

let dId, tId;
dId = 0;
tId = 1;
let dis = [];
rest = rest.map((item) => {
  if (!dis.includes(item.district)) {
    dis.push(item.district);
    dId++;
  }
  const newItem = { ...item, dId: dId, tId: tId };
  tId++;

  return newItem;
});
console.log(rest);
console.log(dis);
const FileSystem = require("fs");
FileSystem.writeFile("file.json", JSON.stringify(rest), (error) => {
  if (error) throw error;
});
