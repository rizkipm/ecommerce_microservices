const express = require('express');
const app = express();

//dummy data
barangs = [
    {
        "id": 1,
        "name": "Macbook Pro M2",
        "description": "This is a Macbook Pro M2",
        "price": 20000000
    },
    {
        id: 2,
        "name": "Iphone 16 Pro",
        "description": "This is an Iphone 16 Pro",
        "price": 15000000
    },
    {
        id: 3,
        "name": "Samsung Galaxy S20",
        "description": "This is a Samsung Galaxy S20",
        "price": 12000000
    }];

app.get('/barang', (req, res) => {
    res.send(barangs);

})

app.get('/barang/:id', (req, res) => {
    const id = req.params.id;
    const barang = barangs.find(barang => barang.id == id);

    if(!barangs){
                return res.status(404).json(
                    {
                        "message": "barang not found"
                    }
        
                );
            }
        
            req.send(products);


})

// app.get('/barang/:id', (req, res) => {
//     const id = req.params.id;
//     const barang = barangs.find(barang => barang.id == id);


//    

// })

app.listen(8500, () => {
    console.log('Product service is running on port 8500'); 

});