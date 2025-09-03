@include('admin.products.ProductGallery')
@include('admin.products.ProductVideo')
@include('admin.products.Attri')

<script>
    class Product extends BaseClass {
        no_set = [];
        all_categories = @json(\App\Model\Admin\Category::getForSelect());
        all_manufactures = @json(\App\Model\Admin\Manufacturer::getForSelect());
        all_attributes = @json(\App\Model\Admin\Attribute::getForSelect());

        before(form) {
            this.image = {};
            this.image_back = {};
            this.status = 1;
            this.state = 1;
            this._attrs = [];
        }

        after(form) {

        }

        get base_price() {
            return this._base_price ? this._base_price.toLocaleString('en') : '';
        }

        set base_price(value) {
            value = parseNumberString(value);
            this._base_price = value;
        }

        get price() {
            return this._price ? this._price.toLocaleString('en') : '';
        }

        set price(value) {
            value = parseNumberString(value);
            this._price = value;
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get image_back() {
            return this._image_back;
        }

        set image_back(value) {
            this._image_back = new Image(value, this);
        }


        clearImage() {
            if (this.image) this.image.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new ProductGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new ProductGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }

        set attrs(value) {
            this._attrs = (value || []).map(val => new Attri(val, this))
        }

        get attrs() {
            return this._attrs || []
        }

        addAttributes(value) {
            const exists = this._attrs.some(attrWrapper =>
                attrWrapper.id === value.id
            );
            if (exists) {
                toastr.warning('Thuộc tính này đã được thêm');
                return;
            }

            this._attrs.push(new Attri(value, this));
        }

        removeAttributes(index) {
            this._attrs.splice(index, 1)
        }

        get submit_data() {
            let data = {
                cate_id: this.cate_id,
                solution_id: this.solution_id,
                name: this.name,
                manufacturer_id: this.manufacturer_id,
                code: this.code,
                base_price: this._base_price,
                price: this._price,
                short_des: this.short_des,
                intro: this.intro,
                body: this.body,
                status: this.status,
                state: this.state,
                attrs: this._attrs.map(val => val.submit_data),
            }

            data = jsonToFormData(data);
            let image = this.image.submit_data;
            if (image) data.append('image', image);

            let image_back = this.image_back.submit_data;
            if (image_back) data.append('image_back', image_back);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            return data;
        }
    }
</script>
