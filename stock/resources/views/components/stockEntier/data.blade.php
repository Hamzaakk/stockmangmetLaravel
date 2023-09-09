@props(['products','fornisseurs','lieux','stockEntier'])
<div class="container my-5">
    <div class="table-wrap">
        <table class="table table-responsive table-borderless">
            <thead>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Fornisseur</th>
                <th>lieux </th>
                <th>status</th>
                <th>Quantity </th>
                <th>Quantity  initial</th>
                <th>total</th>
                <th>date</th>
                <th>opération</th>
            </thead>
            <tbody>
                @foreach ($stockEntier as $item)
                    @php
                        $product =  \App\Models\Product::find($item->product_id);
                        $category = \App\Models\Category::find($product->category_id);
                        $fornisseur = \App\Models\Fornisseur::find($item->fornisseur_id);
                        $lieux = \App\Models\lieuStock::find($item->lieux_id);

                    @endphp
              
                <tr class="align-middle alert border-bottom" role="alert">
                   
                    <td class="text-center">
                        <img class="pics"
                            src="{{asset('storage/'.$product->image)}}"
                            width="100px"
                            height="100px"
                            alt="">
                    </td>
                    <td>
                        <div>
                            <p class="m-0 fw-bold">{{$product->name}}</p>
                            <p class="m-0 text-muted">{{$category->name}}</p>
                        </div>
                    </td>
                    <td>
                        {{$item->priceforOne}}DH</p>
                    </td>
                    <td>{{$fornisseur->name}}</td>
                    <td>
                        <div>
                            <p class="m-0 fw-bold">{{$lieux->name}}</p>
                            <p class="m-0 text-muted">{{$lieux->city}}</p>
                        </div>
                    </td>
                   <td> <span class="badge rounded-pill badge-danger">{{$item->status}}</span></td>
                    <td class="d-">
                        <p class="border text-center"> {{$item->quantité}} </p>
                    </td>
                    <td>{{$item->stockinit}}</td>
                    <td>
                        {{$item->total}}DH
                        
                    </td>
                    <td>{{$item->created_at->format('Y-d-m')}}</td>
                    <td>
                        <form action="{{route('stockenier.edit',$item->id)}}" method="GET" class="d-inline">
                            @csrf
                          <button type="submit" class="btn btn-primary btn-sm btn-rounded " >
                            <i class="fas fa-pen"></i>
                          </button>
                        </form>
                          <form action="{{route('stockenier.destroy',$item->id)}}" method="POST"  class="d-inline">
                            @csrf
                            @method('DELETE')
                          <button type="submit" onclick=" return confirm('do you want to delete this user')" class="btn  btn-danger btn-sm btn-rounded d-inline" >
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>