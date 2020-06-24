import React, { useEffect } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import Layout from "../Layouts/Layout";

import NewsCard from "../../components/NewsCard";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

export default function News({ news }) {
    // console.log(news);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title="Latest News" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/news" aria-current="page">
                                    News
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="" style={{ margin: "0 8%" }}>
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <h2 className="single-page-headings">Latest News</h2>

                        <div className="row">
                            {news && news.length > 0 ? (
                                <>
                                    {news.map(n => (
                                        <NewsCard key={n.id} n={n} />
                                    ))}
                                </>
                            ) : (
                                <h3
                                    className="text-center"
                                    style={{
                                        fontWeight: "bold",
                                        color: "#2a9df4"
                                    }}
                                >
                                    No News yet
                                </h3>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

News.layout = page => (
    <Layout children={page} title="News | Kampala Hospital" />
);
