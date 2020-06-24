import React from "react";
import ReactHtmlParser from "react-html-parser";
import { InertiaLink } from "@inertiajs/inertia-react";

export default function Document({ document }) {
    const handlePDF = (event) => {
        event.preventDefault();
        // const file = new Blob([document.image],{type: 'application/pdf'});
        // const fileURL = URL.createObjectURL(file);
        // window.open(fileURL);
    }
    return (
        <div
            className="mt-3 documents"
            style={{ backgroundColor: "white", padding: "5px" }}
        >
            <div className="" style={{ padding: "10px" }}>
                <InertiaLink
                    href={`/documents/${document.id ? document.id : "#"}`}
                >
                    <div className="limit-1-lines">
                        <div>
                            <h4>{document.name ? document.name : ""}</h4>
                        </div>
                    </div>
                </InertiaLink>

                <div className="limit-3-lines">
                    <div>
                        {ReactHtmlParser(
                            document.description ? document.description : ""
                        )}
                    </div>
                </div>

                <a
                    href={`${document.link ? document.link : "#"}`}
                    className="btn btn-block btn-link mt-3"
                    style={{ backgroundColor: "#2a9df4", color: "white" }}
                    onClick={handlePDF}
                >
                    Download
                </a>
            </div>
        </div>
    );
}
