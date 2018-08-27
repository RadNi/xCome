import unittest
from time import sleep

from selenium import webdriver
from test_utility import fields, static_data


class Payment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=user", "password=testtest",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "/profile/int-trans")

    def test_pay_rial(self):  # Assume Money > Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=10"])
        self.driver.find_element_by_id('login').click()
        assert "profile/int-trans" in self.driver.current_url

    def test_pay_dollar(self):  # Assume Money > Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_dollar_wallet_address,
                                                    "price=10", "login"])[2].click()
        assert "successful" in self.driver.find_element_by_tag_name("body").text

    def test_pay_euro(self):  # Assume Money > Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Euro")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_euro_wallet_address,
                                                    "price=10", "login"])[2].click()
        assert "successful" in self.driver.find_element_by_tag_name("body").text

    def test_pay_rial_fail(self):  # Assume Money < Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=10000000000", "login"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def test_pay_dollar_fail(self):  # Assume Money < Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_dollar_wallet_address,
                                                    "price=1000000000", "login"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def test_pay_euro_fail(self):  # Assume Money < Needed
        self.driver.find_element_by_id("Curr_Type").send_keys("Euro")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_euro_wallet_address,
                                                    "price=10", "login"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def test_pay_empty_payee(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["price=10", "login"])[1].click()
        assert "int-trans" in self.driver.current_url

    def test_pay_empty_price(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "login"])[1].click()
        assert "int-trans" in self.driver.current_url

    def test_pay_price_format(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=1dfsd0", "login"])[2].click()
        assert "int-trans" in self.driver.current_url

    def test_pay_price_too_much(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=10000000000", "login"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def test_pay_too_low(self):
        self.driver.find_element_by_id("Curr_Type").send_keys("Rial")
        fields.get_components_by_name(self.driver, ["payee-id=" + static_data.valid_rial_wallet_address,
                                                    "price=-10", "login"])[2].click()
        assert "Enough" in self.driver.find_element_by_tag_name("body").text

    def tearDown(self):
        self.driver.close()
