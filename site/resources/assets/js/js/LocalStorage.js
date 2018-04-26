class LocalStorage {
  static readData(key) {
    return JSON.parse(localStorage.getItem(key)) || [];
  }

  static addObj(obj, key) {
    let data = JSON.parse(localStorage.getItem(key)) || [];
    obj.id = data.length;
    data.push(obj);
    data = JSON.stringify(data);
    localStorage.setItem(key, data);
  }

  static saveData(obj, key) {
    localStorage.setItem(key, JSON.stringify(obj));
  }
}

export default LocalStorage;