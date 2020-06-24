import React, { useEffect } from "react";
import ReactHtmlParser from "react-html-parser";
import Layout from "../Layouts/Layout";

import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

export default function SingleNews({ news }) {
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
                <Banner title={news.title ? news.title : ""} />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item">
                                <a href="/news">News</a>
                            </li>

                            <li
                                className="breadcrumb-item active"
                                aria-current="page"
                            >
                                {news.title ? news.title : ""}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="container">
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <div>
                            <h1 className="" style={{ color: "#2a9df4" }}>
                                {news.title ? news.title : ""}
                            </h1>

                            <div>
                                <div>
                                    {ReactHtmlParser(
                                        news.description ? news.description : ""
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

SingleNews.layout = page => (
    <Layout children={page} title="News Details | Kampala Hospital" />
);
