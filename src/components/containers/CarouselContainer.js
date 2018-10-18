import React, { Component } from "react";
import {
  Carousel,
  CarouselItem,
  CarouselControl,
  CarouselIndicators,
  CarouselCaption
} from "reactstrap";

const items = [
  {
    src:
      "https://firebasestorage.googleapis.com/v0/b/fisiob-f5aca.appspot.com/o/mahdi-haddadi-1106359-unsplash.jpg?alt=media&token=ca4677d9-2426-456b-9ccc-57c25cfe331a",
    altText: "fisio",
    caption: "fisioterapia"
  },
  {
    src:
      "https://firebasestorage.googleapis.com/v0/b/fisiob-f5aca.appspot.com/o/fezbot2000-1106534-unsplash.jpg?alt=media&token=b7891e1b-0c34-435b-bf52-ebdf986fab73",
    altText: "osteo",
    caption: "osteopatia"
  },
  {
    src:
      "https://firebasestorage.googleapis.com/v0/b/fisiob-f5aca.appspot.com/o/erik-mclean-1105925-unsplash.jpg?alt=media&token=6f654251-a93e-41eb-afc1-0d5d5a0f9751",
    altText: "pilates",
    caption: "pilates"
  }
];

class CarouselContainer extends Component {
  constructor(props) {
    super(props);
    this.state = { activeIndex: 0 };
    this.next = this.next.bind(this);
    this.previous = this.previous.bind(this);
    this.goToIndex = this.goToIndex.bind(this);
    this.onExiting = this.onExiting.bind(this);
    this.onExited = this.onExited.bind(this);
  }

  onExiting() {
    this.animating = true;
  }

  onExited() {
    this.animating = false;
  }

  next() {
    if (this.animating) return;
    const nextIndex =
      this.state.activeIndex === items.length - 1
        ? 0
        : this.state.activeIndex + 1;
    this.setState({ activeIndex: nextIndex });
  }

  previous() {
    if (this.animating) return;
    const nextIndex =
      this.state.activeIndex === 0
        ? items.length - 1
        : this.state.activeIndex - 1;
    this.setState({ activeIndex: nextIndex });
  }

  goToIndex(newIndex) {
    if (this.animating) return;
    this.setState({ activeIndex: newIndex });
  }

  render() {
    const { activeIndex } = this.state;

    const slides = items.map(item => {
      return (
        <CarouselItem
          onExiting={this.onExiting}
          onExited={this.onExited}
          key={item.src}
        >
          <img
            style={{ height: 600, maxWidth: "1024px" }}
            src={item.src}
            alt={item.altText}
          />
          <CarouselCaption
            captionText={item.caption}
            captionHeader={item.caption}
          />
        </CarouselItem>
      );
    });

    return (
      <Carousel
        activeIndex={activeIndex}
        next={this.next}
        previous={this.previous}
      >
        <CarouselIndicators
          items={items}
          activeIndex={activeIndex}
          onClickHandler={this.goToIndex}
        />
        {slides}
        <CarouselControl
          direction="prev"
          directionText="Previous"
          onClickHandler={this.previous}
        />
        <CarouselControl
          direction="next"
          directionText="Next"
          onClickHandler={this.next}
        />
      </Carousel>
    );
  }
}

export default CarouselContainer;
