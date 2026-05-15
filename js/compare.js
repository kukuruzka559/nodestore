const CompareManager = {
    key: 'product_comparison',

    add(id) {
        let list = this.get();
        if (!list.includes(id)) {
            list.push(id);
            localStorage.setItem(this.key, JSON.stringify(list));
            alert('Товар добавлен к сравнению');
        }
    },

    get() {
        return JSON.parse(localStorage.getItem(this.key) || '[]');
    },

    clear() {
        localStorage.removeItem(this.key);
    }
};

// Вызов: CompareManager.add(1);